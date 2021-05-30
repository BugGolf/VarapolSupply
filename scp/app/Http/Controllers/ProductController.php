<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
  public function index()
  {
    return view('product.view', [
      "products" => Product::all()
    ]);
  }

  public function lowStock()
  {
    return view('product.low_stock', [
      "products" => Product::whereRaw('in_stock < min_stock')->get()
    ]);
  }

  public function addProduct()
  {
    return view('product.add', [
      "categorys" => Category::all()
    ]);
  }
  
  public function editProduct(Request $request, $id)
  {
    return view('product.edit', [
      "product" => Product::find($id),
      "categorys" => Category::all()
    ]);
  }

  
  public function store(Request $request)
  {
    if($request->filled('name'))
    {
      $product = new Product();
      $product->user_id = UserService::getSession()->id;
      $product->name = $request->input('name');
      $product->category_id = $request->input('category_id') ?? 1;
      $product->min_stock = $request->input('min_stock') ?? 1;
      $product->in_stock = $request->input('in_stock') ?? 1;
      $product->unit = $request->input('unit') ?? "ชิ้น";
      $product->save();

      return redirect('/product');
    } else {
      $request->session()->flash('PRODUCT_STORE', 'กรุณากรอกชื่อสินค้า');
      return redirect('/product/add');
    }
  }

  public function update(Request $request, $id)
  {
    if($request->filled('name'))
    {
      $product = Product::find($id);
      $product->user_id = UserService::getSession()->id;
      $product->name = $request->input('name');
      $product->category_id = $request->input('category_id') ?? 1;
      $product->min_stock = $request->input('min_stock') ?? 1;
      $product->unit = $request->input('unit') ?? "ชิ้น";
      $product->save();

      return redirect('/product');
    } else {
      $request->session()->flash('PRODUCT_STORE', 'กรุณากรอกชื่อสินค้า');
      return redirect('/product/edit/' . $id);
    }
  }

  public function delete(Request $request, $id)
  {
    Product::find($id)->delete();
    return redirect('/product');
  }

}