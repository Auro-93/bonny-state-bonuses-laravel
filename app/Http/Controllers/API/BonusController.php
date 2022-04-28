<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ResponseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Carbon\Carbon;


use App\Models\Bonus;
use App\Models\Category;



class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResponseController $response)
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

        $bonuses = $bonuses->get();
        $bonusesData = ["bonuses" => $bonuses];
        

        if(count($bonuses) > 0){
            return $response->sendResponse($bonusesData, "Bonuses Successfully Found.");  
        }else{
            return $response->sendResponse($bonusesData, "Bonuses list is empty.");  
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
           $bonus = Bonus::create($request->all());
           $bonusData = ["bonus" => $bonus];
            return $response->sendResponse($bonusData, "Bonus Successfully Created.", 201);  
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
        $bonus = Bonus::find($id);

        if($bonus){
            $bonusData = ["bonus" => $bonus];
            return $response->sendResponse($bonusData, "Bonus Successfully Found.", 200); 
        }else{
            return $response->sendError('Resource Not Found Error.', "Bonus with the id of $id not found");  
            
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
        $bonus = Bonus::find($id);

        if($bonus){
            $validation = $this->rules($request);

        if($validation->fails()){
            return $response->sendError('Validation Error.', $validation->errors(), 400);  

        }else{
           $bonus->fill($request->all());
           $bonus->save();
           $bonusData = ["bonus" => $bonus];
            return $response->sendResponse($bonusData, "Bonus Successfully Updated.");  
        }

        }else{
            return $response->sendError('Resource Not Found Error.', "Can't update the resource. Bonus with the id of $id not found"); 
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
        $bonus = Bonus::find($id);

        if($bonus){
            $bonusData = ["bonus" => $bonus];
            return $response->sendResponse($bonusData, "Bonus Successfully Deleted.", 200);    
        }else{
            return $response->sendError('Resource Not Found Error.', "Can't delete the resource. Bonus with the id of $id not found"); 
        }
        
    }

    public function rules (Request $request){
        $uniqueRule =  Rule::unique('bonuses')->where(function ($query) use ($request){
            $query->where('name', $request['name']);
            $query->where('sold_at', $request['sold_at']);
        });

        $messages = [
            'name.unique' => 'The pair of values ​​provided for the "Name" and "Sold At" fields already exists in the database',
            'category_id.exists' => "The category_id value does not match any existing category"
        ];
        

        $rules = [
            'name' => ['required', 'max:255', $request->getMethod() === "POST" ? $uniqueRule : NULL],
            'category_id' => 'required|numeric|exists:categories,id',
            'quantity_sold'  => 'required|numeric|min:1',
            'sold_at' => 'required|date_format:Y-m-d',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
