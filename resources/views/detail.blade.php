@extends('home-layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('home-layouts.detail-sidebar')
            </div>
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
                                <a class="venobox" data-maxwidth="50%" href="{{ asset('storage/thumbnail/' . $book->thumbnail) }}">
                                    <img src="{{ asset('storage/thumbnail/' . $book->thumbnail) }}"
                                    alt="" class="w-50">
                                </a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0 fw-bold">Author : {{ $book->author_name }}</p>
                            <p class="mb-0 fw-bold">Category : {{ $book->category->name }}</p>
                            <p class="mb-0 fw-bold">Price : <span class="text-primary fw-bold">{{ $book->price }}
                                    MMK</span></p>
                            <p class="mb-0 fw-bold">Review</p>
                            <p class="my-3" style="font-style: italic;">{{ $book->review }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('welcome') }}" class="btn btn-secondary">Back</a>
                            <div>
                                @auth
                                    @bought($book->id)
                                        <a href="{{ route('buyerDownlad',$book->id) }}" class="btn btn-primary">Download</a>
                                    @else
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Buy Now
                                        </button>
                                    @endbought
                                @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Buy Now
                                    </button>
                                @endauth

                                <!-- Vertically centered modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">Are you sure
                                                    to
                                                    buy this book?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mb-0">Book Name : {{ $book->name }}</p>
                                                <p class="mb-0">Price : {{ $book->price }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('buy.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $book->id }}" name="book_id">
                                                    <button class="btn btn-primary">Buy Now</button>
                                                </form>
                                            </div>
                                        </div>
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
