<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
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
                <th>Content</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
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
