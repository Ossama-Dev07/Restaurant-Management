<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all employees
        $employees = Employee::all();
        return response()->json($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => ['required', Rule::in(['waiter', 'delivery', 'manager', 'chef'])], // Assuming these are your enum values
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:employees',
        ]);
        $employee = Employee::create($request->all());

        
        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find employee by id
        $employee = Employee::findOrFail($id);
        return response()->json($employee, 200);
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
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => ['required', Rule::in(['waiter', 'delivery', 'manager', 'chef'])], // Enum validation
            'phone' => 'required|string|max:15',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees')->ignore($id)],
        ]);

        $employee = Employee::findOrFail($id);
        if($employee){
            return$employee->update($request->all());
        }
        
        return response()->json( $employee, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Employee::destroy($id);
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
