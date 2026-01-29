<div class="container">
    <h1>Create Counter</h1>
    <form method="POST" action="{{ route('counters.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="key">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ old('key') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="value">Value</label>
            <input type="number" name="value" id="value" class="form-control" value="{{ old('value', 0) }}">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('counters.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

