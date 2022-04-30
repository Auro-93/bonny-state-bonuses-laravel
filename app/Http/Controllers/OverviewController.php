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

        // RETURN TOTAL OF BONUS CATEGORIES SAVED-MINUTES
        $total = Category::sum('saved_minutes');

        // RETURN CATEGORY WITH MAX SAVED-MINUTES
        $max = Category::orderBy('saved_minutes', 'desc')->first();

        // RETURN CATEGORY WITH MIN SAVED-MINUTES
        $min = Category::orderBy('saved_minutes', 'asc')->first();

        // RETURN LATEST 5 CATEGORIES CREATED
        $latest_cat = Category::latest()->take(5)->get();

              // RETURN LATEST 5 BONUSES CREATED
        $latest_bonuses = Bonus::select("name")->distinct()->latest()->take(5)->get();

        return view("pages/overview", compact('total', 'max', 'min', 'latest_cat', 'latest_bonuses'));
      
    }

}
