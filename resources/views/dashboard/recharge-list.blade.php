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
                        <div class="text-center">
                            <h4 class="mb-3 fw-bold">Recharge List</h4>
                        </div>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recharges as $recharge)
                                        <tr>
                                            <td>{{ $recharge->amount }}</td>
                                            <td>
                                                @if ($recharge->approve === '0')
                                                    <span class="badge rounded-pill text-bg-primary">Pending</span>
                                                @elseif ($recharge->approve === '1')
                                                    <span class="badge rounded-pill text-bg-success">Success</span>
                                                @elseif ($recharge->approve === '2')
                                                    <span class="badge rounded-pill text-bg-danger">Fail</span>
                                                @endif
                                            </td>
                                            <td>{{ $recharge->created_at->format('d M Y') }}</td>
                                            <td>{{ $recharge->created_at->format('h:i:s') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                There is no result.
                                            </td>
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
