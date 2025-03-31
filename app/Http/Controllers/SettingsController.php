<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.pages.settings.index', [
            'title' => 'Website Setting',
            'heading' => 'Website Setting For SEO',
            'data' => Settings::first(),
        ]);
    }
    public function site(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'keyword' => 'required',
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
            'description' => $request->description,
            'keyword' => $request->keyword,
        ];
        if ($request->hasFile('logo')) {
            $validator = Validator::make($request->all(), [
                'logo' => 'file|mimes:jpeg,png,jpg|max:2048', // Validation for image files only
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
            $logo = $request->file('logo');
            $eks = $logo->getClientOriginalExtension();
            $imgHash = md5($logo->getClientOriginalName()) . '.' . $eks;
            $logo->storeAs('assets/site/logo', $imgHash);
            $data['logo'] =  $imgHash;
        }
        Settings::first()->update($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Site Settings Updated Successfully!',
            'icon' => 'success'
        ]);
    }
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'link_instagram' => 'required',
            'link_facebook' => 'required',
            'link_tiktok' => 'required',
            'link_twitter' => 'required',
            'link_shopee' => 'required',
            'link_tokopedia' => 'required',
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
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'link_instagram' => $request->link_instagram,
            'link_facebook' => $request->link_facebook,
            'link_twitter' => $request->link_twitter,
            'link_tiktok' => $request->link_tiktok,
            'link_shopee' => $request->link_shopee,
            'link_tokopedia' => $request->link_tokopedia,
        ];

        Settings::first()->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Site Settings Updated Successfully!',
            'icon' => 'success'
        ]);
    }
}
