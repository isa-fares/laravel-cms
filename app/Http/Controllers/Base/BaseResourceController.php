<?php

namespace App\Http\Controllers\Base;

use App\Services\Base\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseResourceController extends Controller
{
    protected $service;
    protected $viewPath;
    protected $routeName;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->service->getAll();
        return view($this->viewPath . '.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewPath . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->create($request->validated());

        return redirect()->route($this->routeName . '.index')
            ->with('success', ucfirst($this->routeName) . ' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        return view($this->viewPath . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return view($this->viewPath . '.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        $this->service->update($model, $request->validated());

        return redirect()->route($this->routeName . '.index')
            ->with('success', ucfirst($this->routeName) . ' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        $this->service->delete($model);

        return redirect()->route($this->routeName . '.index')
            ->with('success', ucfirst($this->routeName) . ' deleted successfully.');
    }
}
