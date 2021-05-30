<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  use HasFactory;
  protected $table = "transaction";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product_id',
    'method',
    'total'
  ];

  protected $with = [
    "product",
    "user"
  ];

  public function product()
  {
    return $this->belongsTo('App\Models\Product');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }


}