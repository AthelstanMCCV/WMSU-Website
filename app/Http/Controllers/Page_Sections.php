<?php

namespace App\Http\Controllers;

use App\Models\Page_Section;
use Illuminate\Http\Request;

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

    public function showHomepage() {
        $sections = Page_Section::where('page_id', 1)->get();
        $groupedSections = $sections->groupBy('indicator');
    
        return view('homepage', [
            'sections' => $groupedSections
        ]);
    }

    public function showDashboard() {
        $sections = Page_Section::where('page_id', 1)->get()->groupBy('indicator');
        return view('admin.admin-homepage', compact('sections'));
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
}
