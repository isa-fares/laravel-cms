<div class="container">
    <h1>{{ $service->title }}</h1>
    
    <div class="mb-3">
        <strong>Status:</strong> {{ $service->status }}<br>
        <strong>Slug:</strong> {{ $service->slug }}<br>
        <strong>Order:</strong> {{ $service->order }}<br>
        @if($service->icon)
            <strong>Icon:</strong> {{ $service->icon }}
        @endif
    </div>
    
    <div class="mb-3">
        <h3>Description:</h3>
        <p>{{ $service->description }}</p>
    </div>
    
    <div>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to Services</a>
        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
