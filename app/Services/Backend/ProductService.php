<?php

namespace App\Services\Backend;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\Property;
use App\Models\ShippingType;

class ProductService
{

    public function activeCategoriesWithLevel($level)
    {
        return Category::where('level', $level);
    }

    public function fetchAllShippingTypes()
    {
        return ShippingType::all();
    }

    public function subCategories($id)
    {
        return Category::where('parent_id', $id)->get();
    }

    public function store($request)
    {
        // store product Image && record
        $fileName = null;
        if($request->has('image') && !is_null($request->image))
        {
            $image = $request->file('image');
            $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
            $destinationPath = public_path().'/Uploads/products' ;
            $image->move($destinationPath,$fileName);
        }
        $product = Product::create([
            'name' => $request->title,
            'category_id' => $request->category,
            'shipping_type_id' => $request->shipping_type,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'weight_unit' => $request->weight_unit,
            'availablity' => $request->is_available ?? 0 ,
            'details' => $request->description,
        ]);
        if($product){
            ProductMedia::create([
                'product_id' => $product->id,
                'name' => $fileName,
                'media_type' => 'image',
            ]);
        }

        return;
    }


    public function update($request, $id)
    {
        // Update product Image && record
        $product = Product::where('id', $id)->first();
        if($product)
        {
            $productMedia = ProductMedia::where('product_id', $product->id)->first();
            $fileName = $productMedia->name;
            if($request->has('image') && !is_null($request->image))
            {
                $image = $request->file('image');
                $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
                $destinationPath = public_path().'/Uploads/property' ;
                $image->move($destinationPath,$fileName);
            };

            $product = Product::where('id', $id)->update([
                'name' => $request->title,
                'shipping_type_id' => $request->shipping_type,
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'weight_unit' => $request->weight_unit,
                'availablity' => $request->is_available ?? 0 ,
                'details' => $request->description,
            ]);

            if($product){
                ProductMedia::where('id', $productMedia->id)->update([
                    'name' => $fileName,
                ]);
            }

        }
        return true;
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}
