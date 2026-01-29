<div class="container">
    <h1>Edit Counter</h1>
    <form method="POST" action="{{ route('counters.update', $counter->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="key">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ old('key', $counter->key) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="value">Value</label>
            <input type="number" name="value" id="value" class="form-control" value="{{ old('value', $counter->value) }}">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $counter->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('counters.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

