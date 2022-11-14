<div class="card">
    <div class="card-body">
        <h4>Dashboard</h4>
        <hr>
        @admin
            <p class="small text-black-50 mb-1">Manage Category</p>
            <div class="list-group mb-2 list-group-flush shadow-sm rounded">
                <a href="{{ route('category.create') }}"
                    class="list-group-item list-group-item-action {{ request()->is('category*') ? 'active' : '' }}">
                    Category List
                </a>
            </div>
            <p class="small text-black-50 mb-1">Manage User</p>
            <div class="list-group mb-2 list-group-flush shadow-sm rounded">
                <a href="{{ route('user.index') }}"
                    class="list-group-item list-group-item-action {{ request()->is('user*') ? 'active' : '' }}">
                    User List
                </a>
            </div>
            <p class="small text-black-50 mb-1">Manage Book</p>
            <div class="list-group mb-2 list-group-flush shadow-sm rounded">
                <a href="{{ route('book.create') }}" class="list-group-item list-group-item-action {{ request()->is('book/create') ? 'active' : '' }}">
                    Add Book
                </a>
                <a href="{{ route('book.index') }}" class="list-group-item list-group-item-action {{ request()->is('book') & !request('trash') ? 'active' : '' }}">
                    Book List
                </a>
                <a href="{{ route('book.index',['trash'=>'true']) }}" class="list-group-item list-group-item-action {{ request('trash') ? 'active' : '' }}">
                    Trash
                </a>
            </div>
        @endadmin
    </div>
</div>
