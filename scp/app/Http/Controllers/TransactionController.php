<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

  public function incomeStock()
  {
    return view('transaction.add', [
      "method" => 1,
      "products" => Product::all()
    ]);
  }

  public function outcomeStock()
  {
    return view('transaction.add', [
      "method" => 2,
      "products" => Product::all()
    ]);
  }

  public function reportIncome()
  {
    return view('transaction.report', [
      'method' => 1,
      'transactions' => Transaction::where('method', 1)->get()
    ]);
  }

  public function reportOutcome()
  {
    return view('transaction.report', [
      'method' => 2,
      'transactions' => Transaction::where('method', 2)->get()
    ]);
  }

  public function addIncome(Request $request)
  {
    DB::transaction(function() use($request) {
      $transaction = new Transaction();
      $transaction->fill($request->all());
      $transaction->user_id = UserService::getSession()->id;
      $transaction->method = 1;
      $transaction->save();

      $product = Product::find($request->input("product_id"));
      $product->in_stock = intval($product->in_stock) + intval($request->input('total'));
      $product->save();
    });

    return redirect('/product');
  }

  public function addOutcome(Request $request)
  {
    DB::transaction(function() use($request) {
      $transaction = new Transaction();
      $transaction->fill($request->all());
      $transaction->user_id = UserService::getSession()->id;
      $transaction->method = 2;
      $transaction->save();

      $product = Product::find($request->input("product_id"));
      $inStock = intval($product->in_stock) - intval($request->input('total'));
      $product->in_stock = $inStock < 0 ? 0 : $inStock;
      $product->save();
    });

    return redirect('/product');
  }

}