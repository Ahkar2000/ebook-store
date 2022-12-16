@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card p-3 col-md-12">
                    <div class="card-body">
                        <div class="text-center">
                            <h4 class="mb-3 fw-bold">Recharge Detail</h4>
                            <hr>
                        </div>
                        <div>
                            <table style="border-collapse: separate; border-spacing: 2em 0;">
                                <tr>
                                    <th>User Name :</th>
                                    <td>{{ $recharge->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Amount :</th>
                                    <td>{{ $recharge->amount }}</td>
                                </tr>
                                <tr>
                                    <th>Last 8 digits of trasnition id : </th>
                                    <td>{{ $recharge->lastId }}</td>
                                </tr>
                                <tr>
                                    <th>Bank :</th>
                                    <td>{{ $recharge->bank }}</td>
                                </tr>
                                <tr>
                                    <th>Date :</th>
                                    <td>{{ $recharge->created_at->format("d M Y") }}</td>
                                </tr>
                                <tr>
                                    <th>Time :</th>
                                    <td>{{ $recharge->created_at->format("h:i:s") }}</td>
                                </tr>
                                <tr>
                                    <th>Screen Shot :</th>
                                </tr>
                            </table>
                            <a class="venobox" data-gall="myGallery" href="{{ asset("storage/ss/$recharge->tphoto") }}"><img src="{{ asset("storage/ss/$recharge->tphoto") }}" class="w-25 ms-4 mt-3"></a>
                            <div class="mt-3 d-flex justify-content-end">
                                <form action="{{ route('recharge.update',[$recharge->id,'status'=>'false']) }}" method="POST" class="me-2">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-danger">Decline</button>
                                </form>
                                <form action="{{ route('recharge.update',[$recharge->id,'status'=>'true']) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-success">Approve</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
