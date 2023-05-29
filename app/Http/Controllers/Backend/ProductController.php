<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Models\Product;
use App\Services\Backend\ProductService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use JsonResponse;
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::where('id', '!=', null)->with('media', 'category')->get();

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->activeCategoriesWithLevel(0)->get();
        $shipping_types = $this->productService->fetchAllShippingTypes();
        return view('backend.products.create', compact('categories', 'shipping_types'));
    }

    public function store(ProductRequest $request)
    {
        $this->productService->store($request);
        return $this->success('Product add successfully.', ['success' => true, 'data' => null]);
    }

    public function show($id)
    {
        $productDetals = Product::where('id', $id)->with('category', 'media')->get();
        return view('backend.products.show', compact('productDetals'));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->with('media')->get();
        $shipping_types = $this->productService->fetchAllShippingTypes();
        return view('backend.products.edit', compact('product', 'shipping_types'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->update($request, $id);
        return $this->success('Product update successfully.', ['success' => true, 'data' => null]);
    }


    public function delete($id)
    {
        try
        {
            $this->productService->destroy($id);
            return $this->success('Product Deleted Successfully', ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    public function subCategories($id)
    {
        $subCategories = $this->productService->subCategories($id);
        return $this->success('', ['success' => true, 'data' => compact('subCategories')]);
    }
}
