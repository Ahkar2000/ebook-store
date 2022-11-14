@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card p-3 col-md-12 ">
                    <div class="card-body">
                        <h4>Edit Book</h4>
                        <hr>
                        <div>
                            <form action="{{ route('book.update',$book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-12 d-md-flex">
                                    <div class="col-md-6 pe-md-2">
                                        <x-input name="name" label="Book Name" default="{{ $book->name }}"/>
                                        <x-input name="author_name" label="Author Name" default="{{ $book->author_name }}"/>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Category</label>
                                            <select name="category_id"
                                                class="form-select   @error('category') is-invalid @enderror">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $book->category->id){{ "selected" }}@endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-md-2">
                                        <x-input name="price" label="Price" default="{{ $book->price }}"/>
                                        <x-input name="pdf" label="PDF Upload" type="file" />
                                        <img src="{{ asset('storage/thumbnail/'.$book->thumbnail) }}" class="w-25" alt="">
                                    </div>
                                </div>
                                <div>
                                    <label for="" class="form-label">Review</label>
                                    <textarea name="review" class="form-control @error('review') is-invalid @enderror" rows="10">{{$book->review}}</textarea>
                                    @error('review')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
