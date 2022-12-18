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
                        <div class="d-flex justify-content-between">
                            <h4 class="">Buyer Lists</h4>
                            <div>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <a id="today" href="{{ route('getLists', ['list' => 'today']) }}"
                                        class="me-1 one btn btn-outline-primary">
                                        Today
                                    </a>

                                    <a href="{{ route('getLists', ['list' => 'weekly']) }}"
                                        class="me-1 one btn btn-outline-primary">
                                        Weekly
                                    </a>

                                    <a href="{{ route('getLists', ['list' => 'monthly']) }}"
                                        class="me-1 one btn btn-outline-primary">
                                        Monthly
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="dataInsert">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script>
        function insert(link){
            $.get(link, function(data) {
                $("#dataInsert").html(data)
            })
            history.pushState(null,null,link)
        }
        $(document).ready(function() {
            let current = $("#today").attr("href")
            insert(current)
            $("#today").addClass("btn-primary").removeClass("btn-outline-primary")
            $('.one').on("click", function(e) {
                $(".one").removeClass("btn-primary").addClass("btn-outline-primary")
                e.preventDefault()
                let link = $(this).attr('href')
                $(this).addClass("btn-primary").removeClass("btn-outline-primary")
                insert(link)
            })
        })
    </script>
@endpush
