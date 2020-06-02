<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{   
   public function getUnits()
   {
      $product =  DB::table('measurements')->get();
      return $product;
  }

  public function getCategories()
   {
      $categories =  DB::table('measurements')
      ->whereNull('parent_id')
      ->get();
      return $categories;
  }
}
