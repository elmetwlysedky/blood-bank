<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        return view('Dashboard.Setting.Role.index', [
            'roles' => Role::all()
        ]);

    }

    public function create()
    {

        return view('Dashboard.Setting.Role.create', [
            'permission'=> Permission::pluck('name', 'id'),
        ]);

    }

    public function store(RoleRequest $request)
    {

        $data = $request->validated();

        $role= Role::create($data);
        $permission = $data['permission_id'];
        // $role->assignRole($data['permission_id']);
        $role->syncPermissions($permission);
        session()->flash('success', __('main.added_success'));
        return to_route('role.index');
    }

    public function userPermission($user_id)
    {

        return view('Dashboard.User.permission', [
            'user' => User::findOrFail($user_id),
            'roles' => Role::pluck('name', 'id')
        ]);

    }


    public function addPermission(Request $request, $user_id)
    {


        $user =  User::findOrFail($user_id);
        $roles = $request->validate([
            'role_id'=>'required'
        ]);
        $user->syncRoles([$roles]);

        session()->flash('success', __('main.added_success'));
        return to_route('user.index');
    }

}
