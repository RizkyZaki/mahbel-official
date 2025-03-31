<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.pages.contacts.index', [
            'title' => 'Contact',
            'heading' => 'Data Contact',
            'collection' => Contacts::latest()->get(),
        ]);
    }
    public function show($id)
    {
        $contact = Contacts::find($id);
        if (!$contact) {
            // Mengembalikan respons error dalam format JSON
            return response()->json([
                'error' => 'Data not found.'
            ], 404);
        }

        // Mengembalikan data dalam format JSON
        // $description = new HtmlString($contact->description);
        return response()->json($contact);
    }
    public function destroy(string $id)
    {
        $cat = Contacts::where('id', $id)->first();
        if ($cat) {
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Contact Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Contact Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
