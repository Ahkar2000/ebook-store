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
                        <h4>Recharge Lists</h4>
                        <hr>
                        <div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        @if(request('pending') == 'true')
                                        <th>Control</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recharges as $recharge)
                                    <tr>
                                        <td>{{ $recharge->id }}</td>
                                        <td>{{ $recharge->user->name }}</td>
                                        <td>{{ $recharge->amount }}</td>
                                        <td>{{ $recharge->created_at->format("d M Y") }}</td>
                                        <td>{{ $recharge->created_at->format("h:i:s") }}</td>
                                        @if(request('pending') == 'true')
                                        <td>
                                            <a href="{{ route('recharge.show',$recharge->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">There is no result.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
