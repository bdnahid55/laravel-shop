<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }


    // public function index(Request $request): View
    // {
    //     $roles = Role::orderBy('id','DESC')->paginate(10);
    //     return view('back.pages.roles.index',compact('roles'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }

    // show all role
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('back.pages.roles.index',compact('roles'));
        // End of code
    }

    // create role page
    public function create()
    {
        $permissions = Permission::get();
        return view('back.pages.roles.create',compact('permissions'));
        // End of code
    }

    // insert new role and permissions to database
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|unique:roles,name',
            'permission' => 'required',
        ]);

        if (!$validator) {

            $notification = array(
                    'message' => 'Data Insert Failed !!!',
                    'alert-type' => 'error'
                );
            return redirect()->route('admin.roles.create')->withInput()->with($notification);

        }else{

            $role = Role::create([
                'name' => $request->input('name'),
                'guard_name' => 'admin'
            ]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }

            $notification = array(
                'message' => 'Role created successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.roles.index')->with($notification);
        }
        // End of code
    }

    // view role details
    public function show($id)
    {
        $role = Role::find($id);

        if ($role) {
            // echo '<pre>';
            // var_dump($role);
            // echo '</pre>';exit();
            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

            return view('back.pages.roles.view',compact('role','rolePermissions'));

        } else {

            $notification = array(
                'message' => 'Data not found.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.roles.index')->with($notification);

        }
        // End of code
    }

    // show role edit page
    public function edit($id)
    {
        $role = Role::find($id);
        if ($role) {
            $permissions = Permission::get();
            $hasPermissions = $role->permissions->pluck('name');
            return view('back.pages.roles.edit',compact('role','permissions','hasPermissions'));
        } else {
            $notification = array(
                'message' => 'Data not found.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.roles.index')->with($notification);
        }
        // End of code
    }

    // update role and permissions
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|unique:roles,name,'.$id.',id',
            'permission' => 'required',
        ]);

        if (!$validator) {

            $notification = array(
                'message' => 'Data Update Failed !!!',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.roles.edit',$id)->withInput()->with($notification);

        } else {
            // Find the role by ID
            $role = Role::findOrFail($id);

            // Update the role's name
            $role->update([
                'name' => $request->input('name'),
                'guard_name' => 'admin'
            ]);

            // Sync the permissions
            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }

            // Success notification
            $notification = [
                'message' => 'Role updated successfully.',
                'alert-type' => 'success'
            ];
            return redirect()->route('admin.roles.index')->with($notification);
        }
        // End of code
    }
    // delete role and permissions
    public function destroy($id)
    {
        $result = Role::find($id)->delete(); // Delete the role

        if ($result) {
            $notification = array(
                'message' => 'Data deleted successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Failed to delete data.',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('admin.roles.index')->with($notification);
    }
    // End of code
}
