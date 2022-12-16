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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>All Books</h4>
                            <div>
                                @if (!request('trash'))
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                      Filter By
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('book.index') }}">See All</a></li>
                                        <li><a class="dropdown-item" href="{{ route('book.postByAdminChoice') }}">Admin's Choice</a></li>
                                        @foreach ($categories as $category)
                                            <li><a class="dropdown-item" href="{{ route('book.postByCategory',[$category->id]) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                @endif
                                
                                <form action="{{ route('book.index') }}" method="GET" class="d-inline-block">
                                    <div class="d-flex ">
                                        <div class="mb-3 me-2">
                                            <input type="text" placeholder="Search Book" class="form-control"
                                                value="{{ request('search') }}" name="search">
                                        </div>
                                        <div class="">
                                            <button class="btn btn-primary">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="container">
                            <div class="row">
                                @forelse ($books as $book)
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow mb-3 h-100">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="text-center">
                                                    <a class="venobox" data-maxwidth="50%" href="{{ asset('storage/thumbnail/' . $book->thumbnail) }}">
                                                        <img src="{{ asset('storage/thumbnail/' . $book->thumbnail) }}"
                                                        alt="" class="w-75">
                                                    </a>
                                                </div>
                                                <hr>
                                                <div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">Title :
                                                            {{ \Illuminate\Support\Str::limit($book->name, 10) }}</p>
                                                        <p class="mb-0 fw-bold mt-1">Author :
                                                            {{ \Illuminate\Support\Str::limit($book->author_name, 8) }}</p>
                                                        <p class="mb-0 fw-bold mt-1">Category :
                                                            {{ $book->category->name }}</p>
                                                        <div class="d-flex align-items-end justify-content-between">
                                                            <p class="mb-0 fw-bold mt-1">Price : {{ $book->price }}</p>
                                                        </div>
                                                    </div>
                                                    @trash
                                                        <div class="mt-1 d-flex justify-content-end">
                                                            <form
                                                                action="{{ route('book.destroy', [$book->id, 'delete' => 'force']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger me-2">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('book.destroy', [$book->id, 'delete' => 'restore']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-warning text-white">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div class="mt-1 d-flex justify-content-between">
                                                            <a href="{{ route('book.edit', $book->id) }}"
                                                                class="btn btn-warning text-white">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('book.destroy', [$book->id, 'delete' => 'soft']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                            <a href="{{ route('book.show', $book->id) }}"
                                                                class="btn btn-info text-white">
                                                                <i class="bi bi-info-circle"></i>
                                                            </a>
                                                            @admin_choice($book)
                                                                <form
                                                                    action="{{ route('book.admin_choice', [$book->id, 'admin_choice' => 'false']) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button class="btn btn-secondary">
                                                                        <i class="bi bi-star-fill"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form
                                                                    action="{{ route('book.admin_choice', [$book->id, 'admin_choice' => 'true']) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button class="btn btn-secondary">
                                                                        <i class="bi bi-bookmark-plus"></i>
                                                                    </button>
                                                                </form>
                                                            @endadmin_choice
                                                        </div>
                                                    @endtrash
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
