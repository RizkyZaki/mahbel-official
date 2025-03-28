<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.categories.index', [
            'title' => 'Category',
            'heading' => 'Data Category',
            'collection' => Categories::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }

        $eks = $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('assets', md5($request->file('image')) . '.' . $eks);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => md5($request->file('image')) . '.' . $eks,
        ];

        Categories::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Category Added Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $cat = Categories::where('slug', $slug)->first();
        if ($cat) {
            return response()->json([
                'status' => 'true',
                'data' => $cat
            ]);
        } else {
            return response()->json([
                'status' => 'false'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Categories::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }

        $eks = $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('assets', md5($request->file('image')) . '.' . $eks);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        if ($request->file('image')) {
            Storage::delete('assets/' . $cat->image);
            $eks = $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('assets', md5($request->file('image')) . '.' . $eks);
            $data['image'] = md5($request->file('image')) . '.' . $eks;
        }

        $cat->update($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Category Updated Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $cat = Categories::where('slug', $slug)->first();

        if ($cat) {
            if ($cat->image) {
                Storage::delete('assets/' . $cat->image);
            }
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Category Deleted.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Category Not Found.',
                'icon' => 'error',
            ]);
        }
    }
}
