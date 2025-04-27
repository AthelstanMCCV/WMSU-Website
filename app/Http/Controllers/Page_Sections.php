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
            'Research & Extension News' => 2,
            'UpdatesArticles' => 3,
        ];

        $sections = [];

        foreach ($sectionMappings as $indicator => $pageId) {
            $sections[$indicator] = Page_Section::where('page_id', $pageId)
                ->where('indicator', $indicator)
                ->get();
        }

        $latestNewsAlt = Page_Section::where('indicator', 'Research & Extension News')
            ->orderBy('created_at', 'desc')
            ->value('alt');

        $latestNews = Page_Section::where('indicator', 'Research & Extension News')
            ->where('alt', $latestNewsAlt)
            ->get()
            ->keyBy('description');

        $updatesArticlesRaw = Page_Section::where('indicator', 'UpdatesArticles')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('alt');
    
        // Limit to 4 latest groups
        $updatesArticles = $updatesArticlesRaw->sortByDesc(function ($group) {
            // Use the created_at of the first item in each group
            return $group->first()->created_at;
        })->take(4);

        return view('homepage', compact('sections', 'latestNews', 'updatesArticles'));
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
        $sections = Page_Section::where('page_id', 2)->get()->groupBy('indicator');
        return view('admin.admin-res&ext', compact('sections'));
    }

    public function showUpdatesData()
    {
        $sections = Page_Section::where('page_id', 3)->get()->groupBy('indicator');
        return view('admin.admin-updates', compact('sections'));
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
                $filePath = $request->file('media')->store('uploads', 'public');
                $media->imagePath = $filePath;
                $media->save();
            }
        }

        return redirect()->back()->with('success', 'News group updated successfully.');
    }

    public function deleteNewsGroup($alt)
    {
        Page_Section::where('alt', $alt)->delete();
        return redirect()->back()->with('success', 'News item deleted successfully!');
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
            'alt'         => $articleGroupId
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
            'alt'         => $articleGroupId
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
            'alt'         => $articleGroupId
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
                    'alt'         => $articleGroupId
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
                $path = $file->store('updates', 'public'); // or wherever you store images
                Page_Section::create([
                    'page_id' => 3, // or your Updates page id
                    'indicator' => 'UpdatesArticles',
                    'alt' => $alt,
                    'description' => 'ArticleImage',
                    'imagePath' => $path,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Updates article group updated successfully!');
    }
    

    public function deleteUpdateArticleGroup($alt)
    {
        $articles = Page_Section::where('alt', $alt)->get();
    
        foreach ($articles as $article) {
            if ($article->imagePath && Storage::exists('public/' . $article->imagePath)) {
                Storage::delete('public/' . $article->imagePath);
            }
            $article->delete();
        }
    
        return redirect()->back()->with('success', 'Article group deleted successfully!');
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
}
