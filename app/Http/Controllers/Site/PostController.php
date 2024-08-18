<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\PostsRepository;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postsRepository;

    public function __construct(PostsRepository $param)
    {
        $this->postsRepository=$param;
    }


    public function index(Request $request)
    {
        return view('Site.post_details', [
        'posts' =>  $this->postsRepository->posts($request),
//        'post' => $this->postsRepository->show($id)
        ]);
    }

    public function favorite ($post_id)
    {
        $client = Auth::guard('site')->user()->id;
        $post = Post::findOrFail($post_id);

        $post->client()->sync($client);
        return redirect()->back();
    }
}
