<?php

namespace App\Http\Interfaces\API;

interface DobationRequestInterface
{

    public function create($request);

    public function all($request);

    public function delete($id);
}
