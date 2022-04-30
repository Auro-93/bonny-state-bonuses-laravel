<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ResponseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResponseController $response)
    {
        $categories = Category::all();
        $categoriesData = ["categories" => $categories];

        if(count($categories) > 0){
            return $response->sendResponse($categoriesData, "Categories Successfully Found.");  
        }else{
            return $response->sendResponse($categoriesData, "Categories list is empty.");  
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResponseController $response)
    {
        $validation = $this->rules($request);

        if($validation->fails()){
            return $response->sendError('Validation Error.', $validation->errors(), 400);  

        }else{
           $category = Category::create($request->all());
           $categoryData = ["category" => $category];
            return $response->sendResponse($categoryData, "Category Successfully Created.", 201);  
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ResponseController $response)
    {
        $category = Category::find($id);

        if($category){
            $categoryData = ["category" => $category];
            return $response->sendResponse($categoryData, "Category Successfully Found.", 200); 
        }else{
            return $response->sendError('Resource Not Found Error.', "Category with the id of $id not found");  
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ResponseController $response)
    {
        $category = Category::find($id);

        if($category){
            $validation = $this->rules($request, $id);

        if($validation->fails()){
            return $response->sendError('Validation Error.', $validation->errors(), 400);  

        }else{
           $category->fill($request->all());
           $category->save();
           $categoryData = ["category" => $category];
            return $response->sendResponse($categoryData, "Category Successfully Updated.");  
        }

        }else{
            return $response->sendError('Resource Not Found Error.', "Can't update the resource. Category with the id of $id not found"); 
        }
      
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ResponseController $response)
    {
        $category = Category::find($id);

        if($category){
            $categoryData = ["category" => $category];
            return $response->sendResponse($categoryData, "Category Successfully Deleted.", 200);    
        }else{
            return $response->sendError('Resource Not Found Error.', "Can't delete the resource. Category with the id of $id not found"); 
        }
        
    }

    public function rules (Request $request, $id = NULL){
       

        $rules = [
            'name' => ['required',  Rule::unique('categories')->ignore($id), 'max:255'],
            'saved_minutes' => 'required|numeric|min:1'   
        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
