<?php

namespace App\Http\Controllers;

use App\Models\Page_Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Page_Sections extends Controller
{
    public function AddSection(Request $request) {
        $validated = $request->validate([
            'content' => 'nullable|string',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,webm,ogg|max:102400',
        ]);
    
        $mediaPath = null;
    
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('images', 'public');
        }
    
        Page_Section::create([
            'content' => $validated['content'],
            'imagePath' => $mediaPath,
            'page_id' => 1,
            'indicator' => 'Homepage Hero',
            'description' => 'HeroVideo',
            'subpage' => null,
            'elemType' => 'media',
            'alt' => null,
        ]);
    
        return redirect()->back()->with('success', 'Section added successfully!');
    }

    public function showHomepage()
    {
        // Define what sections you want from which page IDs
        $sectionMappings = [
            'Homepage Hero' => 1,
            'Research & Extension News' => 2,
            'About Us' => 3,
            // add more as needed
        ];
    
        $sections = [];
    
        foreach ($sectionMappings as $indicator => $pageId) {
            $sections[$indicator] = Page_Section::where('page_id', $pageId)
                ->where('indicator', $indicator)
                ->get();
        }
    
        return view('homepage', compact('sections'));
    }
    

    public function showHomepageData() {
        $sections = Page_Section::where('page_id', 1)->get()->groupBy('indicator');
        return view('admin.admin-homepage', compact('sections'));
    }

    public function showResearchExtensionData() {
        $sections = Page_Section::where('page_id', 2)->get()->groupBy('indicator');
        return view('admin.admin-res&ext', compact('sections'));
    }

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

    public function addNewsSection(Request $request)
{
    $newsGroupId = (string) Str::uuid();

    $validated = $request->validate([
        'RENewsImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'RENewsTitle' => 'nullable|string',
        'RENewsDate' => 'nullable|date',
        'RENewsContent' => 'nullable|string',
        'page_id' => 'required|integer|exists:pages,id',
    ]);

    // Handle image upload if it exists
    $imagePath = null;
    if ($request->hasFile('RENewsImg')) {
        $imagePath = $request->file('RENewsImg')->store('images', 'public');

        Page_Section::create([
            'page_id' => $validated['page_id'],
            'description' => 'RENewsImg',
            'content' => null,
            'imagePath' => $imagePath,
            'indicator' => 'Research & Extension News',
            'elemType' => 'image',
            'subpage' => null,
            'alt' => $newsGroupId,
        ]);
    }

    // Insert Title row
    if ($request->RENewsTitle) {
        Page_Section::create([
            'page_id' => $validated['page_id'],
            'description' => 'RENewsTitle',
            'content' => $request->RENewsTitle,
            'imagePath' => null,
            'indicator' => 'Research & Extension News',
            'elemType' => 'text',
            'subpage' => null,
            'alt' => $newsGroupId,
        ]);
    }

    // Convert to date format before saving
    $dateInput = $request->input('RENewsDate');
    $formattedDate = date('Y-m-d', strtotime($dateInput));
    
    // Insert Date row
    if ($request->RENewsDate) {
        Page_Section::create([
            'page_id' => $validated['page_id'],
            'description' => 'RENewsDate',
            'content' => $formattedDate,  // <- this was the fix
            'imagePath' => null,
            'indicator' => 'Research & Extension News',
            'elemType' => 'date',
            'subpage' => null,
            'alt' => $newsGroupId,
        ]);
    }

    // Insert Content row
    if ($request->RENewsContent) {
        Page_Section::create([
            'page_id' => $validated['page_id'],
            'description' => 'RENewsContent',
            'content' => $request->RENewsContent,
            'imagePath' => null,
            'indicator' => 'Research & Extension News',
            'elemType' => 'text',
            'subpage' => null,
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

    // Handle optional media upload
    if ($request->hasFile('media')) {
        $media = Page_Section::where('alt', $alt)->where('description', 'RENewsImg')->first();
        if ($media) {
            // Delete old file
            if ($media->imagePath && Storage::exists('public/' . $media->imagePath)) {
                Storage::delete('public/' . $media->imagePath);
            }
            // Store new file
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

    public function showResExtHome(Request $request){
        return view('res&ext-homepage');
    }
    public function showResExtActivities(Request $request){
        return view('res&ext-actprogproj');
    }
}
