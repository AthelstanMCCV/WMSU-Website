<?php

namespace App\Http\Controllers;

use App\Models\Page_Section;
use Illuminate\Http\Request;

class Page_Sections extends Controller
{
    public function AddSection(Request $request){
        $incomingFields = $request->validate([
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Page_Section::create([
            'content' => $incomingFields['content'],
            'image_path' => $imagePath,
            'page_id' => 1,
            'indicator' => 'Homepage Hero',
            'description' => 'HpCTABtn',
            'subpage' => null,
            'elemType' => 'text',
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
}
