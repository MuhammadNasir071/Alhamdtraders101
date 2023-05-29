<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShippingTypeRequest;
use App\Models\ShippingType;
use App\Services\Backend\ShippingTypeService;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShippingTypeController extends Controller
{
    use JsonResponse;
    protected $shippingTypeService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShippingTypeService $shippingTypeService)
    {
        $this->middleware('auth');
        $this->shippingTypeService = $shippingTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingTypes = ShippingType::all();
        return view('backend.shippingType.index', compact('shippingTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.shippingType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingTypeRequest $request)
    {
        $this->shippingTypeService->store($request);
        return $this->success('Record added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shippingType = ShippingType::find($id);
        return view('backend.shippingType.show', compact('shippingType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shippingType = ShippingType::find($id);
        return view('backend.shippingType.edit', compact('shippingType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->shippingTypeService->update($request, $id);
        return $this->success('Record update successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $shippingType = ShippingType::find($id);
            $shippingType->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Unit not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
