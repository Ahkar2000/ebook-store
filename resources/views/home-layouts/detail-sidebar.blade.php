<div class="card">
    <div class="card-body">
        <div>
            <h4>Recently Added</h4>
            @foreach ($books as $book)
            <div class="card my-2 shadow redirect">
                <div class="card-body">
                    <div class="d-flex">
                        <img src="{{ asset('storage/thumbnail/'.$book->thumbnail)}}" class="w-50">
                        <div class="ms-2">
                            <a href="{{ route('welcome.detail',$book->slug) }}" class=" text-decoration-none">
                                @admin_choice($book)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endadmin_choice
                                <p class="mb-0 fw-bold text-primary d-inline">
                                    {{ $book->name }}
                                </p>
                            </a>
                            <p class="mb-0 fw-bold mt-1">
                                {{ $book->author_name }}
                            </p>
                            <p class="mb-0 text-black-50 mt-1" style="font-style: italic;">
                                {{ $book->category->name }}</p>
                            <div class="d-flex align-items-end justify-content-between">
                                <p class="mb-0 fw-bold text-success mt-1">
                                    {{ $book->price }} MMK</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>