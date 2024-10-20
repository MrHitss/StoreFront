<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $request->id,
            'page_content' => 'required',
        ]);

        try {
            $uni = $request->id ? ['id' => $request->id] : ['id' => ''];
            $page = Pages::updateOrCreate($uni,[
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->page_content,
            ]);
    
            return response()->json(['success' => true,'message' => empty($uni['id']) ? 'Page was created successfully!' : 'Page was updated successfully!','redirectTo' => route('pages.show', $page->slug)]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => 'There was an error creating the page: ' . $e->getMessage()], 503); 
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = Pages::where('slug', $slug)->firstOrFail(); 

        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $page = Pages::where('slug', $slug)->firstOrFail(); // Fetch the page by slug
        return view('pages.form')->with(compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $page = Pages::where('slug', $slug)->firstOrFail();
        $page->delete(); 
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');

    }
}
