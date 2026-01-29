<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Counters</h1>
            <a href="{{ route('counters.create') }}" class="btn btn-primary">Create New Counter</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->key }}</td>
                    <td>{{ $item->value }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('counters.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('counters.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('counters.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

