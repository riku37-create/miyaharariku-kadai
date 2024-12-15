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

     // 名前で検索するスコープ
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%");
        });
    }

     // 性別でフィルタリングするスコープ
    public function scopeGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

     // 日付でフィルタリングするスコープ
    public function scopeDate($query, $date)
    {
        return $query->whereDate('created_at', $date);
    }

     // カテゴリーでフィルタリングするスコープ
    public function scopeCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }
}
