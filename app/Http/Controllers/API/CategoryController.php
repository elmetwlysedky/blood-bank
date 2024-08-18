<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\CategoryRepository;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use JsonResponseTrait;
    protected $categoryRepository;

    public function __construct(CategoryRepository $param)
    {
        $this->categoryRepository=$param;
    }

    public function all()
    {
        $data = $this->categoryRepository->all();
        return $this->jsonSuccess($data);
    }
}
