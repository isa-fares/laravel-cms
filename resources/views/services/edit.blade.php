<div class="container">
    <h1>Edit Service</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('services.update', $service->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $service->title) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" 
                   value="{{ old('slug', $service->slug) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $service->description) }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="form-control" 
                   value="{{ old('icon', $service->icon) }}" placeholder="e.g., fa fa-icon">
        </div>
        
        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Select Status</option>
                <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="order">Order</label>
            <input type="number" name="order" id="order" class="form-control" 
                   value="{{ old('order', $service->order) }}" min="0">
        </div>
        
        <button type="submit" class="btn btn-primary">Update Service</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
