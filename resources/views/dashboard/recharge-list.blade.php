@extends('home-layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="mb-0 fw-bold">Recharge List</h4>
                        </div>
                        <div>
                            
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
