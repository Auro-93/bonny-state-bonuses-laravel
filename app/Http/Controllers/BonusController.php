<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

use App\Models\Category;
use App\Models\Bonus;





class BonusController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories = Category::all();

        $bonuses = Bonus::query();

        $from = $request->from_date ? Carbon::createFromFormat('Y-m-d', $request->from_date) : NULL;
        $to =  $request->to_date ?  Carbon::createFromFormat('Y-m-d', $request->to_date) : NULL;
      
        if ($request->filled('category_id')) {
            $bonuses->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('from_date')) {
            $bonuses->whereDate('sold_at', '>=', $from);
        }
        
        if ($request->filled('to_date')) {
            $bonuses->whereDate('sold_at', '<=', $to);
        }

        $bonuses = $bonuses->paginate(4);


        return view("pages/bonuses", compact('bonuses', 'categories'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("pages/create-bonus", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
       
        $request = $this->validateReq($request);
        Bonus::create($request->all());
        return back()->with('success', 'Bonus Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonus = Bonus::find($id);
        $categories = Category::all();
        return view("pages/edit-bonus", compact('bonus','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bonus = Bonus::find($id);
        $request = $this->validateReq($request);
        $bonus->update($request->all());
        return back()->with('success', 'Bonus Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bonus = Bonus::find($id);
        $bonus->delete();
        return redirect()->back()->with('success','Bonus Successfully Deleted');
    }

    public function validateReq(Request $request){
        $uniqueRule =  Rule::unique('bonuses')->where(function ($query) use ($request){
            $query->where('name', $request['name']);
            $query->where('sold_at', $request['sold_at']);
        });


        $request->validate([
            'name' => ['required', 'max:255', $request->getMethod() === "POST" ? $uniqueRule : NULL],
            'category_id' => 'required|exists:categories,id',
            'quantity_sold'  => 'required|numeric|min:1',
            'sold_at' => 'required|date',
        ],   [
            "name.unique" => 'The pair of values ​​provided for the "Name" and "Sold At" fields already exists in the database',
            "category_id.required" => 'The category field is required.'
        ]);

        return $request;
    }
}
