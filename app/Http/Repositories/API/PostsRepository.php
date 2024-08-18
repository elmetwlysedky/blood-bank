<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\PostsInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsRepository implements PostsInterface
{

    public function posts($request)
    {
        $search = $request->search;
        $category = $request->category_id;
        $posts = Post::when($search, function ($query) use ($search) {
            return $query -> where('title', 'like', '%' . $search . '%') ;

        })->when($category, function ($query) use ($category) {
            $query ->wherehas('category', function ($query) use ($category) {
                return $query->where('category_id', $category);
            });
        })->latest()->get();


        return $posts;

    }

    public function favorite($request)
    {
        $client = Auth::guard('sanctum')->user()->id;
        $post = Post::findOrFail($request->post_id);

        $post->client()->sync($client);

        return $post;
    }



    public function create($request){

        Post::create($request);
    }

    public function edit($request,$id){
        $category=Post::findOrFail($id);
        $category->update($request->all());
    }

    public function show($id){
        $post=Post::findOrFail($id);
        return $post;
    }

    public function delete($id){

        $data = Post::destroy($id);
        return $data;
    }


}
