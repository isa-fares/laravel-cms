<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Services\CounterService;
use App\Http\Requests\StoreCounterRequest;
use App\Http\Requests\UpdateCounterRequest;

class CounterController extends Controller
{
    protected $service;

    public function __construct(CounterService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $items = $this->service->getAll();
        return view('counters.index', compact('items'));
    }

    public function create()
    {
        return view('counters.create');
    }

    public function store(StoreCounterRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('counters.index')->with('success', 'Counter created.');
    }

    public function show(Counter $counter)
    {
        return view('counters.show', compact('counter'));
    }

    public function edit(Counter $counter)
    {
        return view('counters.edit', compact('counter'));
    }

    public function update(UpdateCounterRequest $request, Counter $counter)
    {
        $this->service->update($counter, $request->validated());
        return redirect()->route('counters.index')->with('success', 'Counter updated.');
    }

    public function destroy(Counter $counter)
    {
        $this->service->delete($counter);
        return redirect()->route('counters.index')->with('success', 'Counter deleted.');
    }
}

