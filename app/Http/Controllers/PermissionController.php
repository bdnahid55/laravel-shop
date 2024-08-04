<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    // show all permission
    public function index()
    {

        $permissions = Permission::all();
        return view('back.pages.permissions.index', compact('permissions'));

        // End of code
    }

    // edit permission page
    public function edit($id)
    {
        $permission = Permission::find($id);

        if ($permission) {

            // echo '<pre>';
            // var_dump($permission);
            // echo '</pre>';exit();
            return view('back.pages.permissions.edit', compact('permission'));

        } else {

            $notification = array(
                'message' => 'Data not found.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.permissions.index')->with($notification);

        }
        // End of code
    }

    // update permission
    public function update($id, Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|unique:permissions,name,'.$id.',id'
        ]);

        if (!$validator) {

            $notification = array(
                    'message' => 'Update Failed !!!',
                    'alert-type' => 'error'
                );
            return redirect()->route('admin.permissions.edit',$id)->withInput()->with($notification);

        }else{

            // update data into database
            $result = Permission::findOrFail($id)->update([
                'name' => $request->name
            ]);

            if ($result) {
                $notification = array(
                    'message' => 'Permission update successfully.',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Failed !!!',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('admin.permissions.index')->with($notification);

        }
        // End of code
    }

// End
}
