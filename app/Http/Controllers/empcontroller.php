<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmpController extends Controller
{
    public function index(){

    }
    public function create(){
            return view('employee.create');
    }
     public function store(Request $request){
        $rules = [
            'name' => 'required|min:2',
            'email' => 'required|min:5|email',

        ];
      $validator = Validator::make($request->all(), $rules);


      if($validator ->fails()){
        return redirect()->route('employee.create')->withInput()->withErrors($validator)
;
      }


     }



    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }

}
