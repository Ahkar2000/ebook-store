<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Book Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody id="tb">
        @forelse ($buyerLists as $buyerList)
        <tr>
            <td>{{ $buyerList->id }}</td>
            <td>{{ $buyerList->user->name }}</td>
            <td>{{ $buyerList->book->name }}</td>
            <td>{{ $buyerList->amount }}</td>
            <td>{{ $buyerList->created_at->format("d M Y") }}</td>
            <td>{{ $buyerList->created_at->format("h:i:s") }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">There is no result.</td>
            </tr>
        @endforelse
    </tbody>
</table>