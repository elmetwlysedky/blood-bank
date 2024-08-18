<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\PostsRepository;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    use JsonResponseTrait;
    protected $postsRepository;

    public function __construct(PostsRepository $param)
    {
        $this->postsRepository=$param;
    }

    public function posts(Request $request)
    {
        $data = $this->postsRepository->posts($request);
        return $this->jsonSuccess($data);
    }

    public function favorite(Request $request)
    {
        $data = $this->postsRepository->favorite($request);
        return $this->jsonSuccess($data);
    }
}
