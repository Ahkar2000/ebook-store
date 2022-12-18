<?php

namespace App\Http\Controllers;

use App\Models\BuyerList;
use App\Http\Requests\StoreBuyerListRequest;
use App\Http\Requests\UpdateBuyerListRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BuyerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.buyer.index');
    }
    public function getLists(){
        if(request('list') == 'today'){
            $buyerLists = BuyerList::whereDate('created_at',Carbon::now()->toDateString())->get();
        }else if(request('list') == 'weekly'){
            $buyerLists = BuyerList::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        }else if(request('list') == 'monthly'){
            $buyerLists = BuyerList::whereMonth('created_at', Carbon::now()->month)->get();
        }
        return view('auth.buyer.table',compact('buyerLists'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuyerListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuyerListRequest $request)
    {
        $book = Book::findOrFail($request->book_id);
        $price = $book->price;
        $user = User::findOrFail(Auth::id());
        $check = BuyerList::where('book_id',"$request->book_id")->where('user_id',"$user->id")->count();

        if($price > $user->amount){
            return to_route('welcome.detail',$book->slug)->with('message',"You don't have enough balance.");
        }else if($check != NULL){
            return to_route('welcome.detail',$book->slug);
        }
        $user->amount = $user->amount - $price;
        $user->update();
        //add to buerlist table
        $buyerList = new BuyerList();
        $buyerList->book_id = $request->book_id;
        $buyerList->amount = $price;
        $buyerList->user_id = Auth::id();
        $buyerList->save();
        //reduce amount from user account
        return to_route('welcome.detail',$book->slug)->with('message','You have bought this book.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerList $buyerList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerList $buyerList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuyerListRequest  $request
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuyerListRequest $request, BuyerList $buyerList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerList $buyerList)
    {
        //
    }
    public function buyerDownlad($id){
        $user_id = Auth::id();
        $buyBook = BuyerList::where('user_id',"$user_id")->where('book_id',"$id")->count();
        if($buyBook == NULL){
            return abort(402);
        }
        $book = Book::findOrFail($id);
        return Storage::download('public/pdf/' . $book->pdf);
    }
    public function myBooks(){
        $books = BuyerList::where('user_id',Auth::id())->paginate(6);
        return view('dashboard.my-books',compact('books'));
    }
}
