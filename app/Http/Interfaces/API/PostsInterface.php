<?php

namespace App\Http\Interfaces\API;

interface PostsInterface
{

    public function posts($request);

    public function favorite($request);


}
