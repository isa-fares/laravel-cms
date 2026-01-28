<div class="container">
    <h1>{{ $post->title }}</h1>

    <div class="mb-3">
        <strong>Status:</strong> {{ $post->status }}<br>
        <strong>Author:</strong> {{ $post->author->name }}<br>
        <strong>Slug:</strong> {{ $post->slug }}
    </div>

    <div class="mb-3">
        <h3>Content:</h3>
        <p>{{ $post->content }}</p>
    </div>

    @if($post->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
        </div>
    @endif

    <div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
