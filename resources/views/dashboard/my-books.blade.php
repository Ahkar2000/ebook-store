@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('home-layouts.dashboard-sidebar')
            </div>
        </div>
    </div>
@endsection
