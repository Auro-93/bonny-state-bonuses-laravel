<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\API\ResponseController;

use App\Models\Category;



class AggregateController extends Controller
{
  public function total_saved_minutes (ResponseController $response){
      $categories = Category::first();

      if($categories){
        $total = ["total_saved_minutes" => Category::sum('saved_minutes')];
        return $response->sendResponse($total, "Data about categories saved_minutes sum Successfully Found.");  
      }else{
        return $response->sendResponse(0, "Categories list is empty. Total categories saved_minutes: 0");  
      }

  }

  public function max_saved_minutes(ResponseController $response) {
    $categories = Category::first();

    if($categories){
        $max = Category::orderBy('saved_minutes', 'desc')->first();
      return $response->sendResponse($max, "Data about categories max saved_minutes Successfully Found.");  
    }else{
      return $response->sendResponse(0, "Categories list is empty. Categories saved_minutes max: 0");  
    }

  }

  public function min_saved_minutes(ResponseController $response) {
    $categories = Category::first();

    if($categories){
        $min = Category::orderBy('saved_minutes', 'asc')->first();
      return $response->sendResponse($min, "Data about categories min saved_minutes Successfully Found.");  
    }else{
      return $response->sendResponse(0, "Categories list is empty. Categories saved_minutes min: 0");  
    }

}
}
