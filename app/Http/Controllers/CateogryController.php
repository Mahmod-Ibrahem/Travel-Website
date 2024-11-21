<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequeust;
use Illuminate\Http\Request;

class CateogryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequeust $request)
    {
        //
        $validatedData = $request->validated();
        $fullPath = $validatedData['category_image']
            ->storeAs('Images/CategoryImage', $validatedData['category_image'] . '.' . $validatedData['category_image']->getClientOriginalExtension());
        $validatedData['category_image'] = $fullPath;
        \App\Models\Category::create($validatedData);
        session()->flash('status', 'Category was Added!');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
