<div class="container">
    <h1>{{ $counter->key }}</h1>
    <p><strong>Value:</strong> {{ $counter->value }}</p>
    <p><strong>Description:</strong> {{ $counter->description }}</p>
    <a href="{{ route('counters.index') }}" class="btn btn-secondary">Back</a>
</div>

