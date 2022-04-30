<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Validation\Rule;

use App\Models\Category;
use App\Models\Bonus;

class CategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        //GET ALL CATEGORIES 
        $categories = Category::simplePaginate(4);
        return view("pages/categories", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages/create-category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATE REQUEST
        $request = $this->validateReq($request);

        //CREATE CATEGORY
        Category::create($request->all());
        return back()->with('success', 'Category Successfully Created!');
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
        $category = Category::find($id);
        return view("pages/edit-category", compact('category'));
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
        $category = Category::find($id);

        //VALIDATE REQUEST
        $request = $this->validateReq($request, $id);

        //UPDATE CATEGORY
        $category->update($request->all());
        return back()->with('success', 'Category Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        //DELETE CATEGORY
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category Successfully Deleted');
       
    }

    public function validateReq(Request $request, $id = NULL){

        //VALIDATION RULES
        $request->validate([
            'name' => ['required',Rule::unique('categories')->ignore($id), 'max:255'],
            'saved_minutes' => 'required|numeric|min:1'
        ], 
        ["name.unique" => 'The value provided for the "Name" filed already exists in the database']);

        return $request;
    }
}
