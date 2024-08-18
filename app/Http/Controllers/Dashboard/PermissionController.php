<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        return view('Dashboard.Setting.permission.index', [
            'permissions' => Permission::all()
        ]);

    }

    public function create()
    {
        return view('Dashboard.Setting.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
        Permission::create($data);
        session()->flash('success', __('main.added_success'));
        return to_route('permission.index');
    }











}
