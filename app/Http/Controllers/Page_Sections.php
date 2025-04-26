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
            'About Us' => 3,
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

        return view('homepage', compact('sections', 'latestNews'));
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
