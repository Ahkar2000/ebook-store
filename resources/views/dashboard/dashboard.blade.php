@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="mb-0 fw-bold">Welcome To Dashboard</h4>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-person-circle" style="font-size: 100px!important"></i>
                            <div class="ms-3">
                                <p class="mb-0">Name : {{ Auth::user()->name }}</p>
                                <p class="mb-0">Email : {{ Auth::user()->email }}</p>
                                <p class="mb-0 text-primary">Amount : {{ Auth::user()->amount }} MMK</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('home-layouts.dashboard-sidebar')
            </div>
        </div>
    </div>
@endsection
