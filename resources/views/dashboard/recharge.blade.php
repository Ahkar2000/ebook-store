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
                            <h4 class="mb-0 fw-bold">Recharge</h4>
                            <hr>
                            <form action="{{ route('recharge.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-md-flex">
                                    <div class="col-md-6 col-12 pe-2">
                                        <x-input name="amount" label="Recharge Amount" />
                                        <div class="mb-3">
                                            <label class="form-label">Select Bank</label>
                                            <select name="bank" class="form-select @error('bank') is-invalid @enderror">
                                                <option value="wave">Wave Money</option>
                                                <option value="kpay">KBZ Pay</option>
                                            </select>
                                            @error('bank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2 col-12">
                                        <x-input name="lastId" label="Last 4 digit of Transitioin Id" />
                                        <div>
                                            <label class="form-label">Screenshot of Transition</label>
                                            <input type="file" name="tphoto" class="form-control @error('tphoto') is-invalid @enderror">
                                            @error('tphoto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
