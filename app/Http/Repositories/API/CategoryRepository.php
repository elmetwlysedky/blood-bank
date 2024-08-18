<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\CategoryInterface;
use App\Models\Category;
use App\Models\Post;

class CategoryRepository implements CategoryInterface
{



    public function get_pluck()
    {
        $category = Category::pluck('name','id');
        return $category;
    }

    public function all()
    {
        $category = Category::latest()->paginate(10);
        return $category;
    }

    public function create($request){

        Category::create($request->all());
    }

    public function edit($request,$id){
        $category=Category::findOrFail($id);
        $category->update($request->all());
    }

    public function show($id){
        $category=Category::findOrFail($id);
        return $category;
    }

    public function delete($id){

        $data = Category::destroy($id);
        return $data;
    }
}
