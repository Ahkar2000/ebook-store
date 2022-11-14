@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card p-3 col-md-12">
                    <div class="card-body">
                        <h4>Book Detail</h4>
                        <hr>
                        <div>
                            <div class="col-md-3 m-auto">
                                <img src="{{ asset('storage/thumbnail/'.$book->thumbnail) }}" class="w-100" alt="">
                            </div>
                            <div class="mt-3">
                                <div>
                                    <h4 class="fw-bold text-black-50">Title : <span class="text-black" style="font-style: italic;">{{ $book->name }}</span></h4>
                                    <h4 class="fw-bold text-black-50">Author Name : <span class="text-black" style="font-style: italic;">{{ $book->author_name }}</span></h4>
                                    <h4 class="fw-bold text-black-50">Category Name : <span class="text-black" style="font-style: italic;">{{ $book->category->name }}</span></h4>
                                    <h4 class="fw-bold text-black-50">Price : <span class="text-primary" style="font-style: italic;">{{ $book->price }}</span></h4>
                                    <h4 class="fw-bold text-black-50">Review</h4>
                                    <p class="fw-bold" style="font-style: italic;">{{ $book->review }}</p>
                                    <p>{{ $book->user->name }} : {{ $book->created_at->format('d M Y : h:i:s A') }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="me-2">
                                        <a href="{{ route('book.download',$book->id) }}" class="btn btn-primary">Download PDF</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
