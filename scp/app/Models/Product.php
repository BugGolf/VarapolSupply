<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $table = "product";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'category_id',
    'name',
    'in_stock',
    'min_stock',
    'unit'
  ];

  public function category()
  {
    return $this->belongsTo('App\Models\Category');
  }

  public function getCategoryNameAttribute()
  {
    return $this->category->name ?? "ไม่มีหมวดหมู่";
  }
}