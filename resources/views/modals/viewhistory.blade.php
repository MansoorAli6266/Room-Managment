<!-- resources/views/modals/view_history_modal.blade.php -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Cost</th>
            <th scope="col">Description</th>
            <th scope="col">Date&Time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->cost }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <button class="btn btn-danger">
                        delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
