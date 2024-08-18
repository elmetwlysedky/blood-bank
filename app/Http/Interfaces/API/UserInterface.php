<?php

namespace App\Http\Interfaces\API;

interface UserInterface
{
    public function all();

    public function show($id);

    public function delete($id);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($rquest,$id);
}
