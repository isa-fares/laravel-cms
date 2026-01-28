<div class="container">
    <h1>Edit Post</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $post->title) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" 
                   value="{{ old('slug', $post->slug) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $post->content) }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($post->image)
                <small>Current: {{ $post->image }}</small>
            @endif
        </div>
        
        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Select Status</option>
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                <option value="deleted" {{ old('status', $post->status) == 'deleted' ? 'selected' : '' }}>Deleted</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="author_id">Author</label>
            <select name="author_id" id="author_id" class="form-control" required>
                <option value="">Select Author</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('author_id', $post->author_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
