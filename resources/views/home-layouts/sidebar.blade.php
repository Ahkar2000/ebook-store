<div class="card">
    <div class="card-body">
        <form action="{{ route('welcome') }}" method="GET" class="d-inline-block">
            <div class="d-flex ">
                <div class="mb-3 me-2">
                    <input type="text" placeholder="Search Book" class="form-control"
                        value="{{ request('search') }}" name="search">
                </div>
                <div class="">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div>
            <p class="small text-black-50 mb-1">Search By Category</p>
            <div class="list-group mb-2 list-group-flush shadow-sm rounded">
                <a href="{{ route('welcome') }}" class="hside list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">See All</a>
                <a href="{{ route('welcome.postByAdminChoice') }}" class="hside list-group-item list-group-item-action {{ request()->is('admin-choice') ? 'active' : '' }}">Admin's Choice</a>
                @foreach ($categories as $category)
                    <a href="{{ route('welcome.category',$category->slug) }}" class="hisde list-group-item list-group-item-action {{ request()->is("ebooks/$category->slug") ? 'active' : '' }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- @push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("a").on("click", function(e) {
                e.preventDefault()
                let link = $("a").attr("href")
                console.log(link)
            })
        })
    </script>
@endpush --}}