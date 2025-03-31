<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.abouts.index', [
            'title' => 'About',
            'heading' => 'Data About',
            'collection' => Abouts::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
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

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ];

        Abouts::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'About Added Successfully!',
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
        $cat = Abouts::where('slug', $slug)->first();
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
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

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ];

        Abouts::find($id)->update($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'About Updated Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $cat = Abouts::where('slug', $slug)->first();
        if ($cat) {
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'About Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'About Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
