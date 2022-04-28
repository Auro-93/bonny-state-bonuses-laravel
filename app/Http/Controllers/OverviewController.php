<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Bonus;


class OverviewController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total = Category::sum('saved_minutes');
        $max = Category::orderBy('saved_minutes', 'desc')->first();
        $min = Category::orderBy('saved_minutes', 'asc')->first();
        $latest_cat = Category::latest()->take(5)->get();
        $latest_bonuses = Bonus::select("name")->distinct()->latest()->take(5)->get();

        return view("pages/overview", compact('total', 'max', 'min', 'latest_cat', 'latest_bonuses'));
      
    }

}
