<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    return view('category.view', [
      "categorys" => Category::all()
    ]);
  }

  public function addCategory()
  {
    return view('category.add');
  }

  public function store(Request $request)
  {
    if($request->filled('name'))
    {
      $category = new Category();
      $category->name = $request->input('name');
      $category->save();

      return redirect('/category');
    } else {
      $request->session()->flash('CATEGORY_STORE', 'กรุณากรอกชื่อสินค้า');
      return redirect('/category/add');
    }
  }

}