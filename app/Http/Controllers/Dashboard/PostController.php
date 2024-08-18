<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\PostsRepository;
use App\Http\Repositories\API\CategoryRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postsRepository , $categoryRepository;

    public function __construct(
        PostsRepository $param,
        CategoryRepository $categoryRepository)
    {
        $this->postsRepository=$param;
        $this->categoryRepository=$categoryRepository;

    }


    public function index(Request $request)
    {

        return view('Dashboard.Post.index',[
            'posts'=>$this->postsRepository->posts($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Post.create',
        [
            'categories'=>$this->categoryRepository->get_pluck()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        if($request->image !=null){
            $path = $request->file('image')->store('PostImages');
            $data['image']=$path;
          }
        $this->postsRepository->create($data);

        session()->flash('success', __('main.added_success'));
        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Dashboard.Post.show',[
           'post' => $this->postsRepository->show($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Dashboard.Post.edit',[
            'post' => $this->postsRepository->show($id),
            'categories'=>$this->categoryRepository->get_pluck()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $data = $request->validated();
        if($request->image !=null){
            $path = $request->file('image')->store('PostImages');
            $data['image']=$path;
          }

        $this->postsRepository->edit($request,$id);
        session()->flash('success',__('main.edited_success'));
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->postsRepository->delete($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
