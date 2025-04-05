<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use App\Models\Categories;
use App\Models\Contacts;
use App\Models\Products;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $cat = Categories::latest()->limit(12)->get();
        $prod = Products::latest()->limit(12)->get();
        return view('client.pages.home', [
            'title' => 'Home',
            'heading' => 'Welcome to Our Website',
            'cat' => $cat,
            'prod' => $prod,
        ]);
    }

    public function about($slug)
    {
        $data = Abouts::where('slug', $slug)->first();
        return view('client.pages.about', [
            'title' => $data->title,
            'heading' => 'Data About',
            'data' => $data,
        ]);
    }

    public function product($slug)
    {
        $data = Products::where('slug', $slug)->first();
        return view('client.pages.product', [
            'title' => $data->name,
            'heading' => 'Data Product',
            'data' => $data,
        ]);
    }

    public function products()
    {
        $data = Products::latest()->get();
        return view('client.pages.products', [
            'title' => 'Products',
            'heading' => 'Data Products',
            'collection' => $data,
        ]);
    }

    public function category($slug)
    {
        $data = Categories::where('slug', $slug)->first();
        return view('client.pages.category', [
            'title' => $data->name,
            'heading' => 'Data Products',
            'collection' => $data->products,
        ]);
    }

    public function categories()
    {
        $data = Categories::latest()->get();
        return view('client.pages.categories', [
            'title' => 'Category',
            'heading' => 'Data Category',
            'collection' => $data,
        ]);
    }

    public function contact()
    {
        // Tampilkan halaman kontak
        return view('client.pages.contact', [
            'title' => 'Contact Us',
            'heading' => 'Get in Touch',
        ]);
    }

    public function contactPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'first'      => 'required|string|max:255',
            'last'       => 'required|string|max:255',
            'email'      => 'required|email',
            'subject'    => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Gabungkan nama depan dan belakang
        $fullName = $request->input('first') . ' ' . $request->input('last');

        Contacts::create([
            'name' => $fullName,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
        ]);


        return back()->with('success', 'Your message has been sent!');
    }


    public function location()
    {
        return view('client.pages.location', [
            'title' => 'Location',
            'heading' => 'Get in Touch',
        ]);
    }

    public function carrier(Request $request)
    {
        abort(404);
    }
}
