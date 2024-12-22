<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }


    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();

        $fullPhone = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $category = Category::find($request->category_id);
        $categoryContent = $category->content;

        return view('confirm', compact('contacts', 'fullPhone', 'categoryContent'));
    }


    public function store(Request $request)
    {
        $contact = $request->all();
        Contact::create($contact);
        return view('thanks');
    }


    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }


    public function search(Request $request)
    {
        $contacts = Contact::with('category')
        ->Search($request->search)
        ->Gender($request->gender)
        ->Date($request->date)
        ->Category($request->category_id)
        ->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
