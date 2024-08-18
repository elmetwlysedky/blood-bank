<?php

namespace App\Http\Interfaces\API;

interface ClientInterface
{
    public function all();

    public function show($id);

    public function delete($id);

    public function active($request , $id);


}
