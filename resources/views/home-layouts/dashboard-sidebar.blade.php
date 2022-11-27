<div class="card">
    <div class="card-body">
        <p class="fw-bold text-center mb-0">Dashboard</p>
        <div class="list-group mb-2 list-group-flush shadow-sm rounded">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
                Profile
            </a>
            <a href="{{ route('recharge.create') }}" class="list-group-item list-group-item-action">
                Recharge
            </a>
            <a href="{{ route('rechargeList') }}" class="list-group-item list-group-item-action">
                Recharge List
            </a>
            <a href="" class="list-group-item list-group-item-action">
                Your Books
            </a>
        </div>
    </div>
</div>
