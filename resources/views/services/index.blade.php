<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Services</h1>
            <a href="{{ route('services.create') }}" class="btn btn-primary">Create New Service</a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>{{ $service->icon }}</td>
                    <td>{{ $service->slug }}</td>
                    <td>{{ $service->status }}</td>
                    <td>{{ $service->order }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
