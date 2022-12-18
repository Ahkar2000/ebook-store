@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('home-layouts.dashboard-sidebar')
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <h4 class="text-center fw-bold mb-3">Your Books</h4>
                                @forelse ($books as $book)
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow mb-3 h-100">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="text-center">
                                                    <a href="{{ route('welcome.detail', $book->book->slug) }}">
                                                        <img src="{{ asset('storage/thumbnail/' . $book->book->thumbnail) }}"
                                                            alt="" class="w-75">
                                                    </a>
                                                </div>
                                                <hr>
                                                <div>
                                                    <div>
                                                        <a href="{{ route('welcome.detail', $book->book->slug) }}"
                                                            class=" text-decoration-none">
                                                            @admin_choice($book->book)
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                            @endadmin_choice
                                                            <p class="mb-0 fw-bold text-primary d-inline">
                                                                {{ $book->book->name }}
                                                            </p>
                                                        </a>
                                                        <p class="mb-0 fw-bold mt-1">
                                                            {{ $book->book->author_name }}
                                                        </p>
                                                        <p class="mb-0 text-black-50 mt-1" style="font-style: italic;">
                                                            {{ $book->book->category->name }}</p>
                                                        <div class="d-flex align-items-end justify-content-between">
                                                            <p class="mb-0 fw-bold text-success mt-1">
                                                                {{ $book->book->price }} MMK</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <span>
                                            No books added.
                                        </span>
                                    </div>
                                @endforelse
                            </div>
                            <div class="mt-3">
                                {{ $books->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
