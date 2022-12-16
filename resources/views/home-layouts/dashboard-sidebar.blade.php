<div class="card">
    <div class="card-body">
        <h4>Dashboard</h4>
        <hr>
        <div class="list-group mb-2 list-group-flush shadow-sm rounded">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
                Profile
            </a>
            <a href="{{ route('recharge.create') }}" class="list-group-item list-group-item-action {{ request()->is('recharge/create') ? 'active' : '' }}">
                Recharge
            </a>
            <a href="{{ route('rechargeList') }}" class="list-group-item list-group-item-action {{ request()->is('recharge-list') ? 'active' : '' }}">
                Recharge List
            </a>
            <a href="{{ route('myBooks') }}" class="list-group-item list-group-item-action {{ request()->is('my-books') ? 'active' : '' }}">
                Your Books
            </a>
        </div>
    </div>
</div>
