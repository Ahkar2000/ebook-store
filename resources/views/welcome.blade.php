@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('home-layouts.sidebar')
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="fw-bold">Welcome To Our Ebook Store</h4>
                            <p>
                                Ebook Store is a high quality resource for pdf books.You can signin to our website to buy
                                many popular books.You can recharge into your account and buy pdf with recharged money.
                                Our mission is to transform the most popular works of legendary authors to modern reading
                                rooms.Our books are categorized for many subjects in order to be comfortable for all ages of
                                readers.
                            </p>
                        </div>
                        <hr>
                        <div>
                            @if (request()->is('admin-choice'))
                                <h4 class="fw-bold text-center">Admin's Choice</h4>
                            @else
                                <h4 class="fw-bold text-center">All Books</h4>
                            @endif
                            <div class="container">
                                <div class="row">
                                    @forelse ($books as $book)
                                        <div class="col-md-4 mb-3">
                                            <div class="card shadow mb-3 h-100">
                                                <div class="card-body d-flex flex-column justify-content-between">
                                                    <div class="text-center">
                                                        <a href="{{ route('welcome.detail', $book->slug) }}">
                                                            <img src="{{ asset('storage/thumbnail/' . $book->thumbnail) }}"
                                                                alt="" class="w-75">
                                                        </a>
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <div>
                                                            <a href="{{ route('welcome.detail', $book->slug) }}"
                                                                class=" text-decoration-none">
                                                                @admin_choice($book)
                                                                    <i class="bi bi-star-fill text-warning"></i>
                                                                @endadmin_choice
                                                                <p class="mb-0 fw-bold text-primary d-inline">
                                                                    {{ $book->name }}
                                                                </p>
                                                            </a>
                                                            <p class="mb-0 fw-bold mt-1">
                                                                {{ $book->author_name }}
                                                            </p>
                                                            <p class="mb-0 text-black-50 mt-1" style="font-style: italic;">
                                                                {{ $book->category->name }}</p>
                                                            <div class="d-flex align-items-end justify-content-between">
                                                                <p class="mb-0 fw-bold text-success mt-1">
                                                                    {{ $book->price }} MMK</p>
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
    </div>
@endsection
