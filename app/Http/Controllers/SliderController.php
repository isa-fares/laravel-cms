<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Services\SliderService;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        $sliders = $this->sliderService->getAll();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $this->sliderService->create($request->validated());

        return redirect()->route('sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function show(Slider $slider)
    {
        return view('sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $this->sliderService->update($slider, $request->validated());

        return redirect()->route('sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $this->sliderService->delete($slider);

        return redirect()->route('sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
