<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $employees = Employee::search($request->search)
                    ->latest()
                    ->paginate(10)
                    ->withQueryString();
        return view('employees.index', compact('employees'));            
    }

   
    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()
                ->route('employees.index')
                ->with('success', 'Employee created successfully.');
    }

    public function show(string $id)
    {
        
    }

    public function edit($id)
    {
        
        $employee = Employee::findorfail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, $employee)
    {

        $employee = Employee::findOrFail($employee);
        $employee->update($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()
                ->route("employees.index")
                ->with('success', 'Employee deleted Successfully');
    }

    public function trashed(){
        // dd('test');
        $employees = Employee::onlyTrashed()->get();
        return view('employees.trashed', compact('employees'));

    }

    public function restore($employee){

        $employee = Employee::withTrashed()->findOrFail($employee);
        $employee->restore();
        
        return redirect()
                ->route('employees.trashed')
                ->with('success', 'Employee restored successfully');
    }

    public function forceDelete($id){
        $employee = Employee::withTrashed()->findOrFail($id);
        $employee->forceDelete();

        return redirect()
                ->route('employees.trashed')
                ->with('success', 'Employee permanently deleted');

    }

    public function search(Request $request){
        
        $search = $request->search;

        $employees = Employee::query()
                    ->when($search, function($query) use ($search){
                        $query->search($search);
                    })
                    ->latest()
                    ->paginate(5);

        return response()->json($employees);

    }

}
