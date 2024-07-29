<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        return view('back.pages.category.index');
    }

    public function fetchcategorys()
    {
        $categorys = Category::all();
        return response()->json([
            'categorys' => $categorys,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else
        {
            $category = new Category;
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->save();

            return response()->json([
                'status' => 200,
                'message' => 'Added Successfully',
            ]);

        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if($category)
        {
            return response()->json([
                'status' => 200,
                'category' => $category,
            ]);
        }
        else
        {
            return response()->json([
            'status' => 404,
            'message' => 'Category Not Found',
        ]);
        }
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data deleted successfully',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else
        {
            $category = Category::find($id);
            if($category)
            {
                $category->name = $request->input('name');
                $category->slug = $request->input('slug');
                $category->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Updated Successfully',
                ]);
            }
            else
            {
                return response()->json([
                'status' => 404,
                'message' => 'Category Not Found',
                ]);
            }

        }
    }

 // End
}
