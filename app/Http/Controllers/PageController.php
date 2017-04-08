<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Page;
use App\Product;
use GrahamCampbell\Markdown\Facades\Markdown;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
        return view('admin.page.index', ['pages' => $page]);    
    }


    public function new()
    {
        $page = new Page();
        $page->id = -1;
        return view('admin.page.edit', ['page' => $page]);    
    }


    public function save(Request $request)
    {
        if($request->input('id') == -1)
            $page = new Page();
        else
            $page = Page::find($request->input('id'));

        $page->slug = $request->input('slug');
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->save();

        return redirect('/kanepe');    
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', ['page' => $page]);
    }

    public function delete(Page $page)
    {
        $page->delete();
        return redirect('/kanepe');
    }

    public function viewHomePage()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('customer.index', [
                'categories' => $categories,
                'products' => $products
            ]);
    }

    public function viewCatalog($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products;
        return view('customer.catalog', ['products' => $products]);
    }

    public function viewProduct($slug)
    {
        $product = Prodcut::where('slug', $slug)->first();
        $productImage = $product->images;
        $catalogImage = $product->coverImage();
        return view('customer.productDetail', [
                'product' => $product,
                'productImage' => $productImage,
                'catalogImage' => $catalogImage
            ]);
    }

    public function viewPage($slug)
    {
        $page = Page::where('slug', 'hakkimizda')->firstOrFail();
        $page->content = Markdown::convertToHtml($page->content);
        return view('customer.page', ['page' => $page]);
    }

    public function viewContact()
    {
        $page = Page::where('slug', 'iletisim')->firstOrFail();
        return view('customer.pageContact', ['page' => $page]);
    }

    public function sendMail(Request $request)
    {
        $adSoyad = $request->input('name');
        $mail = $request->input('mail');

        $data = [
            'name' => $adSoyad,
            'mail' => $mail,
            'content' => $request->input('content')
        ];
        Mail::send('emails.contact', $data, function ($message) use ($mail, $adSoyad){
            $message->from($mail, $adSoyad);
            $message->replyTo($mail, $adSoyad);
            $message->sender($mail, $adSoyad);

            $message->to('deneme@deneme.com', 'Deneme');
        });
        return redirect('/iletisim');
    }

}
