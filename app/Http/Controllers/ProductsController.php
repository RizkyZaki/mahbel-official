<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.products.index', [
            'title' => 'Product',
            'heading' => 'Data Product',
            'collection' => Products::latest()->get(),
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
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
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
            'price' => $request->price,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => md5($request->file('image')) . '.' . $eks,
        ];

        Products::create($data);

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
        $cat = Products::where('slug', $slug)->first();
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
        $cat = Products::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
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
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
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
        $cat = Products::where('slug', $slug)->first();

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
