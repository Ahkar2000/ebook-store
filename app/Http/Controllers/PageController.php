<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class PageController extends Controller
{
    public function index ()
    {
        $books = Book::when(request('search'), function ($query) {
            $search = request('search');
            $query->where('name', 'like', "%$search%");
        })
        ->latest('id')->paginate(6)->withQueryString();
        return view('welcome', compact('books'));
    }
    
    public function postByCategory(Category $category)
    {
        $books = Book::when(request('search'), function ($query) {
            $search = request('search');
            $query->where('name', 'like', "%$search%");
        })
        ->where("category_id",$category->id)
            ->latest("id")
            ->paginate(6)
            ->withQueryString();;
        return view('welcome',compact('books','category'));
    }
    public function postByAdminChoice(){
        $books = Book::where('admin_choice','1')
        ->latest('id')->paginate(6);
        return view('welcome',compact('books'));
    }
    public function postDetail($slug){
        $book = Book::where('slug',$slug)->first();
        $books = Book::latest('id')->where('id','<>',$book->id)->limit(3)->get();
        return view('detail',compact('book','books'));
    }
}
