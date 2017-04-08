<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Page;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    public function new()
    {
        $product = new Product();
        $categories = Category::all();
        $product->id = -1;
        return view('admin.product.edit', [
                'product' => $product,
                'Categories' => $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('id') == -1)
            $product = new Product();
        else
            $product = Product::find($request->input('id'));

        $product->slug = $request->input('slug');
        $product->urunAd = $request->input('urunAd');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->save();
        $image = $request->file('image');
        $filename = str_slug(
            pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
            .'-'
            .uniqid()
            .'.'
            .$image->getClientOriginalExtension()
        );

        Image::make($image->getRealPath())->resize(512, 512, function ($constraint) {
            $constraint->aspectRatio();
        })->save(base_path().'/public/images/thumbnails/'.$filename);
        Image::make($image->getRealPath())->resize(1280, 720, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(base_path().'/public/images/'.$filename);

        //$image->move(base_path().'/public/images/', $filename);
        $productImage = new ProductImage();
        $productImage->is_cover_image = true;
        $productImage->resimYol = "$filename";
        $productImage->product_id = $product->id;
        $productImage->save();
        return redirect('/kanepe/products');    
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', [
                'product' => $product,
                'categories' => $categories
            ]);
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/kanepe/products');
    }

    public function newImage(Product $product)
    {
        $productImage = new ProductImage();
        $productImage->id = -1;
        return view('admin.product.addImage', [
                'productImage' => $productImage,
                'product' => $product
            ]);
    }

    public function saveImage(Request $request){
        $image = $request->file('image');
        $filename = str_slug(
            pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
            .'-'
            .uniqid()
            .'.'
            .$image->getClientOriginalExtension()
        );
        Image::make($image->getRealPath())->resize(512, 512, function ($constraint) {
            $constraint->aspectRatio();
        })->save(base_path().'/public/images/thumbnails/'.$filename);
        Image::make($image->getRealPath())->resize(1280, 720, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(base_path().'/public/images/'.$filename);

        //$image->move(base_path().'/public/images/', $filename);
        $productImage = new ProductImage();
        $product = Product::find($request->input('id'));
        $productImage->resimYol = "$filename";
        $productImage->product_id = $product->id;
        $productImage->is_cover_image = false;
        $productImage->save();
        return redirect('/kanepe/products');
    }

    public function imageIndex(Product $product)
    {
        $productImage = $product->images;
        return view('admin.product.indexImage', [
                'productImage' => $productImage,
                'product' => $product
            ]);
    }

    public function imageDelete(ProductImage $productImage)
    {
        $productImage->delete();
        return redirect('/kanepe/products');
    }

    public function addImageView(Product $product)
    {
        return view('admin.image.inser', ['product' => $product]);
    }
}
