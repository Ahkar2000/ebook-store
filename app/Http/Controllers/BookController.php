<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::when(request('search'), function ($query) {
            $search = request('search');
            $query->where('name', 'like', "%$search%");
        })
            ->when(request('trash'), function ($query) {
                $query->onlyTrashed();
            })
            ->latest('id')->paginate(6)->withQueryString();
        return view('auth.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = new Book();
        $book->name = request()->name;
        $book->slug = Str::slug(request()->name);
        $book->author_name = request()->author_name;
        $book->category_id = request()->category_id;
        $book->price = request()->price;
        $book->review = request()->review;

        $pdf_name = uniqid() . "_upload." . request()->file('pdf')->extension();
        $request->file('pdf')->storeAs('public/pdf', $pdf_name);
        $book->pdf = $pdf_name;

        $imgName = uniqid() . "_thumbnail.jpg";
        $pdfPath = public_path("storage\pdf\\$pdf_name");
        $imgPath = public_path("storage\\thumbnail\\$imgName");
        $pdf = new Pdf($pdfPath);
        $pdf->saveImage($imgPath);

        $book->thumbnail = $imgName;
        $book->user_id = Auth::id();
        $book->save();

        return to_route('book.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('auth.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('auth.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = request()->name;
        $book->slug = Str::slug(request()->name);
        $book->author_name = request()->author_name;
        $book->category_id = request()->category_id;
        $book->price = request()->price;
        $book->review = request()->review;

        if (request()->hasFile('pdf')) {
            //delete old file
            Storage::delete('public/pdf/' . $book->pdf);
            Storage::delete('public/thumbnail/' . $book->thumbnail);

            //update new file
            $pdf_name = uniqid() . "_upload." . request()->file('pdf')->extension();
            $request->file('pdf')->storeAs('public/pdf', $pdf_name);
            $book->pdf = $pdf_name;

            $imgName = uniqid() . "_thumbnail.jpg";
            $pdfPath = public_path("storage\pdf\\$pdf_name");
            $imgPath = public_path("storage\\thumbnail\\$imgName");
            $pdf = new Pdf($pdfPath);
            $pdf->saveImage($imgPath);
            $book->thumbnail = $imgName;
        }
        $book->user_id = Auth::id();

        $book->update();
        return to_route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request('delete') === 'soft') {
            Book::withTrashed()->findOrFail($id)->delete();
        } elseif (request('delete') === 'restore') {
            Book::withTrashed()->findOrFail($id)->restore();
        } elseif (request('delete') === 'force') {
            $book = Book::withTrashed()->findOrFail($id);
            Storage::delete('public/pdf/' . $book->pdf);
            Storage::delete('public/thumbnail/' . $book->thumbnail);
            Book::withTrashed()->findOrFail($id)->forceDelete();
        }
        return to_route('book.index');
    }

    public function download($id)
    {
        $book = Book::findOrFail($id);
        return Storage::download('public/pdf/' . $book->pdf);
    }
    public function makeAdminChoice($id){
        $book = Book::findOrFail($id);
        if(request('admin_choice') == 'true'){
            $book->admin_choice = '1';
        }elseif(request('admin_choice') == 'false'){
            $book->admin_choice = '0';
        }
        $book->update();
        return to_route('book.index');
    }

    public function postByCategory($id){
        $books = Book::where('category_id',$id)
        ->when(request('trash'), function ($query) {
            $query->onlyTrashed();
        })
        ->latest('id')->paginate(6);
        return view('auth.book.index',compact('books'));
    }
    public function postByAdminChoice(){
        $books = Book::where('admin_choice','1')
        ->when(request('trash'), function ($query) {
            $query->onlyTrashed();
        })
        ->latest('id')->paginate(6);
        return view('auth.book.index',compact('books'));
    }
}
