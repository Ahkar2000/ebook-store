@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="fw-bold">
                                @admin_choice($book)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endadmin_choice
                                {{ $book->name }}
                            </h4>
                            <div>
                                <img src="{{ asset('storage/thumbnail/'.$book->thumbnail) }}" class="w-50">
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0 fw-bold">Author : {{ $book->author_name }}</p>
                            <p class="mb-0 fw-bold">Category : {{ $book->category->name }}</p>
                            <p class="mb-0 fw-bold">Price : <span class="text-primary fw-bold">{{ $book->price }} MMK</span></p>
                            <p class="mb-0 fw-bold">Review</p>
                            <p class="my-3" style="font-style: italic;">{{ $book->review }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('welcome') }}" class="btn btn-secondary">Back</a>
                            <button class="btn btn-primary">Buy</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('home-layouts.detail-sidebar')
            </div>
        </div>
    </div>
@endsection
