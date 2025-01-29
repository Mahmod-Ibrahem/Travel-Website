<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Traits\ImagesUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogApiController extends Controller
{
    use ImagesUtility;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::all();
        return BlogResource::collection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validatedRequestData = $request->validated();
        $storedBlogImage = $this->storeImage($validatedRequestData['image'], 'title');
        $validatedRequestData['image']=$storedBlogImage;
        $validatedRequestData['blog']=str_replace('target="_blank"', '', $validatedRequestData['blog']);
        $createdBlog=Blog::create($validatedRequestData);
        return new BlogResource($createdBlog);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $blog)
    {
       return $blog ? new BlogResource(Blog::Find($blog)) :  response (['message' => 'Blog Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $blog)
    {
        $blog=Blog::find($blog);
        $blogValidatedData=$request->validated();
        if ($blogValidatedData['image'] ?? false)
        {
            if ($blog->image ?? false) {
                $relativePath = $this->getRelativePath($blog->image);
                Storage::delete($relativePath);
            }
            $blogValidatedData['image'] = $this->storeImage($blogValidatedData['image'], 'blog');
        } else
        {
            $blogValidatedData['image'] = $blog['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $blogValidatedData['blog']=str_replace('target="_blank"', '', $blogValidatedData['blog']);
        $blog->update($blogValidatedData);
        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        if ($blog) {
            $blog->delete();
            return response()->noContent();
        }
        return response(['message' => 'Blog Not Found'], 404);
    }
}
