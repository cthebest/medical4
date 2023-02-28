<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('roles', 'name')],
            'permission_ids' => ['nullable', 'array']
        ]);
        $role = Role::create($data);

        $role->syncPermissions($data['permission_ids']);

        return redirect()->route('roles.create')->with('success', 'Role creado con éxito');
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load(['permissions' => function ($query) {
            $query->select('id');
        }]);
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('roles', 'name')->ignore($role)],
            'permission_ids' => ['nullable', 'array']
        ]);
        $role->update($data);

        $role->syncPermissions($data['permission_ids']);

        return redirect()->route('roles.edit', $role->id)->with('success', 'Role creado con éxito');
    }
}
