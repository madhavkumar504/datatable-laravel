<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class UserController extends Controller
{
    public function search(){

        $states = State::all();
        $cities = City::all();
        return view('search', compact('states', 'cities'));
    }
   
    public function searchData(Request $request) {
        if ($request->search) {
            $state = State::where('id', $request->search)->first();

            if ($state) {
                $cities = City::where('state_id',   $state->id)->get();

                $data['state'] = $state;
                $data['cities'] = $cities;
                return response()->json(["status" => "success", "data" => $data]);
            }


        }

        $cities = City::select('city.id','city.name')
        ->join('states as st', 'st.id','city.state_id')->get();

        if($cities){
            return response()->json([
                'message'   =>  "Data Found",
                "code"      =>  200,
                "data"    =>  $cities
            ]);
        }else{
            return response()->json([
                'message'   =>  "Internal server error",
                "data"      =>  500
            ]);
        }        
    }
    public function ajaxSearch(){
        return view('ajax');
    }
}
