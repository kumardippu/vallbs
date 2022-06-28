<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
//use Request;

class EmployeeController extends Controller
{
    public function index(){
        $emps = Employee::all();
        return view('emp.info',['emps' => $emps ]); 
    }

    public function save(Request $request){
        
       if ( $request->isMethod('get') ) {
    
            return view('emp.new');
       }

       if ( $request->isMethod('post') ) {
        
            $request->validate( [
                'name' => 'required',
                'email' => 'required|email|unique:Employees,email',
                //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'emp_id'=>'required | unique:Employees,emp_id'
            ]);

            unset($request['_token']);
            Employee::create($request->all());
            return redirect('/emp')->withSuccess("Employee Records have been stored successfully!");;
       }
    
    }

    public function edit($id,Request $request){
        if ( $request->isMethod('get') ) {
            $emp = Employee::where('id',$id)->first();
            return view('emp.edit',['emp' => $emp ]); 
            
        }
        if ( $request->isMethod('put') ) {
            $request->validate( [
                'name' => 'required',
                'email' => 'required|email',
                //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'emp_id'=>'required'
            ]);

            $emp = Employee::where('id',$id)->first();

            unset($request['_token']);
            unset($request['_method']);

            $emp->update($request->all());
            return redirect('/emp')->withSuccess("Employee Records have been updated successfully!");
        }
    }

    function delete($id){
        $emp = Employee::whereId($id)->first();
        $emp->delete();
        return redirect('/emp')->withFail("Employee Record has been deleted!");
    }

}
