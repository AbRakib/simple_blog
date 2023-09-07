<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tags = Tag::latest()->get();
        return view( 'admin.tag.index', compact( 'tags' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {

        $validated = $request->validate([
            'name' => 'required|unique:tags|max:20',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return response()->json( [
            'success' => 'Tag Stored Successfully Done'
        ] );
    }

    /**
     * Display the specified resource.
     */
    public function show( tag $tag ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( tag $tag ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, tag $tag ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( tag $tag ) {
        //
    }
}
