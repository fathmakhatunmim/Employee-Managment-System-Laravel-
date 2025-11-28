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
            'name' => 'required|min:2|regex:/^[A-Za-z\s]+$/',
            'email' => ['required','regex:/^[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/'
            
],
// ✔ ^ (caret)

// এটার মানে —
// string-এর শুরু এখান থেকে হবে।

// ✔ $ (dollar)

// এটার মানে —
// string-এর শেষ এখানে হবে।

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
//         Regex মানে Regular Expression —
// একটা pattern (নিয়ম) যেটা দিয়ে তুমি string-এর ভেতরে কী কী allow বা reject করবে তা ঠিক করতে পারো।

            'name' => 'required|min:2|regex:/^[A-Za-z\s]+$/',
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

return redirect()->route('employee.index')->with('success', 'Employee update successfully.');


}

    public function delete($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete(); 

    return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
}


}
