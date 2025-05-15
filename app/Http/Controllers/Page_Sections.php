<?php

namespace App\Http\Controllers;

use App\Models\Page_Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Page_Sections extends Controller
{
    /* -------------------------------
        PUBLIC HOMEPAGE DISPLAY
    ---------------------------------*/

    public function showHomepage()
    {
        $sectionMappings = [
            'Homepage Hero' => 1,
            'About Page' => 1,
            'Research & Extension News' => 2,
            'UpdatesArticles' => 3,
        ];

        $sections = [];

        foreach ($sectionMappings as $indicator => $pageId) {
            $sections[$indicator] = Page_Section::where('page_id', $pageId)
                ->where('indicator', $indicator)
                ->get();
        }

        // Fetch all rows for 'About Page' section (page_id = 1)
        $aboutPageSection = Page_Section::where('page_id', 1)
        ->where('indicator', 'About Page')
        ->get(); // This will get all rows for 'About Page'

        $latestNewsAlt = Page_Section::where('indicator', 'Research & Extension News')
            ->where('archived', '!=', 'Yes')
            ->orderBy('created_at', 'desc')
            ->value('alt');

        $latestNews = Page_Section::where('indicator', 'Research & Extension News')
            ->where('alt', $latestNewsAlt)
            ->where('archived', '!=', 'Yes')
            ->get()
            ->keyBy('description');

        $updatesArticlesRaw = Page_Section::where('indicator', 'UpdatesArticles')
            ->where('archived', '!=', 'Yes')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('alt');

        $updatesArticles = $updatesArticlesRaw
            ->sortByDesc(fn($group) => $group->first()->created_at)
            ->take(4);

        return view('homepage', compact('sections', 'latestNews', 'updatesArticles', 'aboutPageSection'));
    }

    public function addAboutSection(Request $request)
{
    $aboutGroupId = (string) Str::uuid();

    $validated = $request->validate([
        'aboutTitle'   => 'nullable|string|max:255',
        'aboutContent' => 'nullable|string',
        'aboutImage'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'links'        => 'nullable|array',
        'links.*'      => 'nullable|string|max:255',
        'page_id'      => 'required|integer|exists:pages,id',
    ]);

    // Image
    if ($request->hasFile('aboutImage')) {
        $imagePath = $request->file('aboutImage')->store('images', 'public');

        Page_Section::create([
            'page_id'    => $validated['page_id'],
            'description'=> 'AboutImage',
            'imagePath'  => $imagePath,
            'indicator'  => 'About Page',
            'elemType'   => 'image',
            'alt'        => $aboutGroupId,
        ]);
    }

    // Title
    if (!empty($request->aboutTitle)) {
        Page_Section::create([
            'page_id'    => $validated['page_id'],
            'description'=> 'AboutTitle',
            'content'    => $validated['aboutTitle'],
            'indicator'  => 'About Page',
            'elemType'   => 'text',
            'alt'        => $aboutGroupId,
        ]);
    }

    // Content
    if (!empty($request->aboutContent)) {
        Page_Section::create([
            'page_id'    => $validated['page_id'],
            'description'=> 'AboutContent',
            'content'    => $validated['aboutContent'],
            'indicator'  => 'About Page',
            'elemType'   => 'text',
            'alt'        => $aboutGroupId,
        ]);
    }

    // Links (if any)
    if (!empty($validated['links'])) {
        foreach ($validated['links'] as $linkText) {
            if (!empty($linkText)) {
                Page_Section::create([
                    'page_id'    => $validated['page_id'],
                    'description'=> 'AboutLink',
                    'content'    => $linkText,
                    'indicator'  => 'About Page',
                    'elemType'   => 'text',
                    'alt'        => $aboutGroupId,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'About section added successfully!');
}

    /* -------------------------------
        ADMIN VIEW PAGES
    ---------------------------------*/

    public function showHomepageData()
    {
        $sections = Page_Section::where('page_id', 1)->get()->groupBy('indicator');
        return view('admin.admin-homepage', compact('sections'));
    }

    public function showResearchExtensionData()
    {
        $allSections = Page_Section::where('page_id', 2)->get();

        // Separate active and archived sections, both grouped by indicator
        $activeSections = $allSections->where('archived', '!=', 'Yes')->groupBy('indicator');
        $archivedSections = $allSections->where('archived', 'Yes')->groupBy('indicator');

        return view('admin.admin-res&ext', compact('activeSections', 'archivedSections'));
    }

    public function showUpdatesData()
    {
        $sections = Page_Section::where('page_id', 3)->get()->groupBy('indicator');

        $updatesArticles = $sections['UpdatesArticles'] ?? collect();

        $groupedByAlt = $updatesArticles->groupBy('alt');

        $nonArchivedGroups = $groupedByAlt->filter(fn($group) => optional($group->first())->archived !== 'Yes');
        $archivedGroups = $groupedByAlt->filter(fn($group) => optional($group->first())->archived === 'Yes');

        return view('admin.admin-updates', compact('sections', 'nonArchivedGroups', 'archivedGroups'));
    }
    /* -------------------------------
        GENERAL SECTION EDIT / UPDATE
    ---------------------------------*/

    public function edit($id)
    {
        $section = Page_Section::findOrFail($id);
        return view('admin.edit-section', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = Page_Section::findOrFail($id);

        $request->validate([
            'content' => 'nullable',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,webm,ogg|max:102400',
        ]);

        if ($request->hasFile('media')) {
            $imagePath = $request->file('media')->store('images', 'public');
            $section->imagePath = $imagePath;
        }

        $section->content = $request->content;
        $section->save();

        return redirect()->back()->with('success', 'Section updated successfully!');
    }

    /* -------------------------------
        RESEARCH & EXTENSION NEWS CRUD
    ---------------------------------*/

    public function addNewsSection(Request $request)
    {
        $newsGroupId = (string) Str::uuid();

        $validated = $request->validate([
            'RENewsImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'RENewsTitle' => 'nullable|string|max:255',
            'RENewsDate' => 'nullable|date',
            'RENewsLocation' => 'nullable|string|max:255',
            'RENewsContent' => 'nullable|string|max:255',
            'page_id' => 'required|integer|exists:pages,id',
        ]);

        // Image
        if ($request->hasFile('RENewsImg')) {
            $imagePath = $request->file('RENewsImg')->store('images', 'public');
            Page_Section::create([
                'page_id' => $validated['page_id'],
                'description' => 'RENewsImg',
                'imagePath' => $imagePath,
                'indicator' => 'Research & Extension News',
                'elemType' => 'image',
                'alt' => $newsGroupId,
                'archived'   => 'No',
            ]);
        }

        // Title
        if ($request->RENewsTitle) {
            Page_Section::create([
                'page_id' => $validated['page_id'],
                'description' => 'RENewsTitle',
                'content' => $request->RENewsTitle,
                'indicator' => 'Research & Extension News',
                'elemType' => 'text',
                'alt' => $newsGroupId,
                'archived'   => 'No',
            ]);
        }

        // Date
        if ($request->RENewsDate) {
            $formattedDate = date('Y-m-d', strtotime($request->RENewsDate));
            Page_Section::create([
                'page_id' => $validated['page_id'],
                'description' => 'RENewsDate',
                'content' => $formattedDate,
                'indicator' => 'Research & Extension News',
                'elemType' => 'date',
                'alt' => $newsGroupId,
                'archived'   => 'No',
            ]);
        }

        // Location
        if ($request->RENewsLocation) {
            Page_Section::create([
                'page_id' => $validated['page_id'],
                'description' => 'RENewsLocation',
                'content' => $request->RENewsLocation,
                'indicator' => 'Research & Extension News',
                'elemType' => 'text',
                'alt' => $newsGroupId,
                'archived'   => 'No',
            ]);
        }

        // Content
        if ($request->RENewsContent) {
            Page_Section::create([
                'page_id' => $validated['page_id'],
                'description' => 'RENewsContent',
                'content' => $request->RENewsContent,
                'indicator' => 'Research & Extension News',
                'elemType' => 'text',
                'alt' => $newsGroupId,
                'archived'   => 'No',
            ]);
        }

        return redirect()->back()->with('success', 'News section added successfully!');
    }

    public function editNewsGroup($alt)
    {
        $newsItems = Page_Section::where('alt', $alt)->get();
        return view('admin.edit-news-group', compact('newsItems'));
    }

public function updateNewsGroup(Request $request, $alt)
{
    // Update text fields
    if ($request->has('newsItems')) {
        foreach ($request->newsItems as $id => $content) {
            $section = Page_Section::find($id);
            if ($section) {
                $section->content = $content;
                $section->archived = 'No';  // Set archive column to No when edited
                $section->save();
            }
        }
    }

    // Media upload
    if ($request->hasFile('media')) {
        $media = Page_Section::where('alt', $alt)->where('description', 'RENewsImg')->first();
        if ($media) {
            if ($media->imagePath && Storage::exists('public/' . $media->imagePath)) {
                Storage::delete('public/' . $media->imagePath);
            }
            $filePath = $request->file('media')->store('images', 'public');
            $media->imagePath = $filePath;
            $media->archived = 'No';  // Also set archive to No for media item
            $media->save();
        }
    }

    return redirect()->back()->with('success', 'News group updated successfully.');
}

    public function deleteNewsGroup($alt)
    {
        Page_Section::where('alt', $alt)->update(['archived' => 'Yes']);
        return redirect()->back()->with('success', 'News item archived successfully!');
    }

    public function restore($alt)
    {
    Page_Section::where('alt', $alt)->update(['archived' => 'No']);

    return redirect()->back()->with('success', 'News item restored successfully.');
    }


    /* -------------------------------
        UPDATES PAGE CRUD
    ---------------------------------*/

    public function addArticlesSection(Request $request)
    {
        // Validate form fields
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'body'    => 'required|string',
            'images'  => 'nullable|array',
            'images.*'=> 'image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);
    
        // Optional: group the article parts with a UUID alt value
        $articleGroupId = (string) Str::uuid();
    
        // Save Title
        Page_Section::create([
            'page_id'     => 3, // or dynamically set if needed
            'description' => 'ArticleTitle',
            'content'     => $validated['title'],
            'imagePath'   => null,
            'indicator'   => 'UpdatesArticles',
            'elemType'    => 'text',
            'subpage'     => null,
            'alt'         => $articleGroupId,
            'archived'   => 'No',
        ]);

            // Save Date
        Page_Section::create([
            'page_id'     => 3,
            'description' => 'ArticleDate',
            'content'     => $validated['date'],
            'imagePath'   => null,
            'indicator'   => 'UpdatesArticles',
            'elemType'    => 'date',
            'subpage'     => null,
            'alt'         => $articleGroupId,
            'archived'   => 'No',
        ]);
    
        // Save Body
        Page_Section::create([
            'page_id'     => 3,
            'description' => 'ArticleBody',
            'content'     => $validated['body'],
            'imagePath'   => null,
            'indicator'   => 'UpdatesArticles',
            'elemType'    => 'text',
            'subpage'     => null,
            'alt'         => $articleGroupId,
            'archived'   => 'No',
        ]);
    
        // Save Images if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
    
                Page_Section::create([
                    'page_id'     => 3,
                    'description' => 'ArticleImage',
                    'content'     => null,
                    'imagePath'   => $imagePath,
                    'indicator'   => 'UpdatesArticles',
                    'elemType'    => 'image',
                    'subpage'     => null,
                    'alt'         => $articleGroupId,
                    'archived'   => 'No',
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Article added successfully!');
    }

    public function updateUpdateArticle(Request $request, $alt)
{
    // Update text fields
    if ($request->has('newsItems')) {
        foreach ($request->newsItems as $id => $content) {
            $section = Page_Section::find($id);
            if ($section) {
                $section->content = $content;
                $section->archived = 'No';  // Set archived to No when edited
                $section->save();
            }
        }
    }

    // Media upload handling
    if ($request->hasFile('media')) {
        $mediaSections = Page_Section::where('alt', $alt)
                            ->where('description', 'ArticleImage')
                            ->get();

        foreach ($mediaSections as $media) {
            // Delete old image if exists
            if ($media->imagePath && Storage::exists('public/' . $media->imagePath)) {
                Storage::delete('public/' . $media->imagePath);
            }
            // Store new file
            $filePath = $request->file('media')->store('images', 'public');
            $media->imagePath = $filePath;
            $media->archived = 'No';  // Set archived to No for media updated
            $media->save();
        }
    }

    // Remove selected images
    if ($request->has('removeImages')) {
        foreach ($request->removeImages as $imageId) {
            $image = Page_Section::find($imageId);
            if ($image && $image->imagePath && Storage::exists('public/' . $image->imagePath)) {
                Storage::delete('public/' . $image->imagePath);
            }
            if ($image) {
                $image->delete();
            }
        }
    }

    // Handle new uploaded images
    if ($request->hasFile('media')) {
        foreach ($request->file('media') as $file) {
            $path = $file->store('images', 'public'); // or wherever you store images
            Page_Section::create([
                'page_id' => 3, // or your Updates page id
                'indicator' => 'UpdatesArticles',
                'alt' => $alt,
                'description' => 'ArticleImage',
                'imagePath' => $path,
                'archived' => 'No', // Set archived to No for newly created images
            ]);
        }
    }

    return redirect()->back()->with('success', 'Updates article group updated successfully!');
}
    

    public function deleteUpdateArticleGroup($alt)
    {
        // Soft delete by marking archived = 'Yes' for all articles with this alt
        Page_Section::where('alt', $alt)->update(['archived' => 'Yes']);

        return redirect()->back()->with('success', 'Article group archived (soft deleted) successfully!');
    }

    public function deleteArticleImage($id)
    {
        $image = Page_Section::findOrFail($id);
    
        if ($image->imagePath && Storage::exists('public/' . $image->imagePath)) {
            Storage::delete('public/' . $image->imagePath);
        }
    
        $image->delete();
    
        return response()->json(['success' => true]);
    }

    public function recover($alt)
    {
        Page_Section::where('alt', $alt)->update(['archived' => 'No']);
        return redirect()->back()->with('success', 'Article group recovered successfully.');
    }

    /* -------------------------------
        PUBLIC RESEARCH & EXTENSION PAGES
    ---------------------------------*/

    public function showResExtHome(Request $request)
    {
        return view('res&ext-homepage');
    }

    public function showResExtActivities(Request $request)
    {
        return view('res&ext-actprogproj');
    }

    public function searchJson(Request $request)
    {
    $query = $request->input('query');

    $matchingSections = Page_Section::where('content', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get();

    $pages = $matchingSections->groupBy('page_id')->map(function ($sections, $pageId) use ($query) {
        $routes = [
            1 => ['title' => 'Homepage', 'route' => route('homepage')],
            2 => ['title' => 'Research & Extension News', 'route' => route('research.news')],
            3 => ['title' => 'Updates', 'route' => route('updates')],
            4 => ['title' => 'ResExt Home', 'route' => url('/ResExt-Home')],
            5 => ['title' => 'ResExt Activities', 'route' => url('/ResExt-Home/Activities')],
            6 => ['title' => 'Linkages', 'route' => url('/Linkages')],
            7 => ['title' => 'About', 'route' => url('/About')],
            8 => ['title' => 'Admission', 'route' => url('/Admission')],
            9 => ['title' => 'Academics', 'route' => url('/Academics')],
        ];

        $snippets = $sections->map(function ($section) use ($query) {
            $content = $section->content ?? '';
            $pos = stripos($content, $query);
            if ($pos !== false) {
                $start = max($pos - 30, 0);
                $length = 60;
                $snippet = substr($content, $start, $length);
                return '... ' . $snippet . ' ...';
            }
            return null;
        })->filter()->values();

        return [
            'title' => $routes[$pageId]['title'] ?? 'Untitled Page',
            'route' => $routes[$pageId]['route'] ?? '#',
            'snippets' => $snippets,
        ];
    })->values();

    return response()->json($pages);
    }
    
    /* -------------------------------
            VIEW PAGES
    ---------------------------------*/

    public function showLinkages(){
        return view('linkage');
    }

    public function showAbout(){
        return view('about');
    }

    public function showAdmission(){
        return view('admission');
    }

    public function showAcademics(){
        return view('academics');
    }

    public function showServices(){
        return view('hero');
    }
}

