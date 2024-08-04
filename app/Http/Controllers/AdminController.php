<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function index()
    {
        // show all Admin
        $admins = Admin::all();
        return view('back.pages.admin.index', compact('admins'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.admin.create');
        // End of code
    }

    public function store(Request $request)
    {
        // validation
        $check_valid = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:2',
            'email' => 'required|min:5|email|unique:admins,email',
            'password' => 'required|min:8',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            $notification = array(
                'message' => 'Failed !!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {

            if ($request->hasFile('image')) {
                // upload new file
                // $file = $request->file('image');
                // $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                // $destinationPath = public_path('/uploads/admin');
                // $file->move($destinationPath, $filename);

                // By using image intervention package
                $file = $request->file('image');
                $manager = new ImageManager(new Driver());
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $img = $manager->read($file);
                $img = $img->resize(100,100);
                $destinationPath = public_path('/uploads/admin/');
                $img->save($destinationPath.$filename);

            }

            // insert data into database
            $result = Admin::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                //'password' => Hash::make($request->password),
                'password' => bcrypt($request->password),
                'image' => $filename,
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                $notification = array(
                    'message' => 'Admin created successfully.',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Failed !!!',
                    'alert-type' => 'error'
                );
            }
            return redirect()->back()->with($notification);
        }
        // end of code
    }

    public function show($id)
    {
        $preview_admin = Admin::find($id);

        if ($preview_admin) {
            // echo '<pre>';
            // var_dump($preview_admin);
            // echo '</pre>';exit();
            return view('back.pages.admin.view', compact('preview_admin'));
        } else {
            $notification = array(
                'message' => 'Data not found.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.admins.all')->with($notification);
        }
        // End of code
    }

    public function edit($id)
    {
        $admin_data = Admin::find($id);

        if ($admin_data) {
            // echo '<pre>';
            // var_dump($admin_data);
            // echo '</pre>';exit();
            return view('back.pages.admin.edit', compact('admin_data'));
        } else {
            $notification = array(
                'message' => 'Data not found.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.admins.all')->with($notification);
        }
        // End of code
    }

    public function update(Request $request, $id)
    {

        $check_valid = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:2',
            'email' => 'required|min:5|email|unique:admins,email,'.$id.',id',
            'password' => 'required|max:50',
            'image' => 'image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            $notification = array(
                'message' => 'Error !!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {

            if ($request->hasFile('image')) {

                // delete previous file
                $findFile = Admin::findorFail($id);
                if ($findFile->image != null) {
                    unlink(public_path('/uploads/admin/' . $findFile->image));
                }

                // upload new file
                // $file = $request->file('image');
                // $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                // $destinationPath = public_path('/uploads/admin/');
                // $file->move($destinationPath, $filename);

                // By using image intervention package
                $file = $request->file('image');
                $manager = new ImageManager(new Driver());
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $img = $manager->read($file);
                $img = $img->resize(100,100);
                $destinationPath = public_path('/uploads/admin/');
                $img->save($destinationPath.$filename);

                // update only file in database
                $result = Admin::find($id)->update([
                    'image' => $filename
                ]);
            }

            // update data into database
            $result = Admin::find($id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                //'password' => Hash::make($request->password),
                'password' => bcrypt($request->password),
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                $notification = array(
                    'message' => 'Data updated successfully.',
                    'alert-type' => 'success'
                );
                return Redirect()->route('admin.admins.all')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Data update failed.',
                    'alert-type' => 'error'
                );
                return redirect()->route('admin.admins.all')->with($notification);
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        // delete previous file
        $findFile = Admin::find($id);
        if ($findFile->image != null) {
            unlink(public_path('/uploads/admin/' . $findFile->image));
        }

        $result = Admin::find($id)->delete();

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
        return redirect()->route('admin.admins.all')->with($notification);
        // End of code
    }

    // End
}
