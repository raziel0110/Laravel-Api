<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return response('Category was created.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     *
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return response('Category record updated.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Category $category
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response('Category record deleted.',201);
    }
}
