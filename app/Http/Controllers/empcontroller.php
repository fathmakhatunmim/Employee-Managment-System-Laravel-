<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;



class EmpController extends Controller
{
   public function index(){
    $employee = Employee::orderBy('id', 'ASC')->get();
    return view('employee.list', ['employee' => $employee]);
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


    
    if ($validator->fails()) {
        return redirect()->route('employee.create')
                         ->withErrors($validator)
                         ->withInput();
    }
       
  $employee = new Employee();
$employee->name = $request->name;
$employee->email = $request->email;
$employee->position = $request->position;
$employee->department = $request->department;
$employee->save();

return redirect()->route('employee.index')->with('success', 'Employee added successfully.');

     }



 public function edit($id)
{
    $employee = employee::findOrFail($id);
    return view('employee.edit',['employee'=>$employee]);
}
    
public function update($id ,Request $request){

    $employee = employee::findOrFail($id);
     $rules = [
            'name' => 'required|min:2',
            'email' => 'required|min:5|email',

        ];
      $validator = Validator::make($request->all(), $rules);


    
    if ($validator->fails()) {
        return redirect()->route('employee.edit',$employee->$id)
                         ->withErrors($validator)
                         ->withInput();
    }
       

$employee->name = $request->name;
$employee->email = $request->email;
$employee->position = $request->position;
$employee->department = $request->department;
$employee->save();

return redirect()->route('employee.index')->with('success', 'Employee added successfully.');


}





    public function delete(){

    }

}
