<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:employees,nip',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string',
            'department' => 'required|string',
            'employment_status' => 'required|in:permanent,contract,internship',
            'basic_salary' => 'required|numeric|min:0',
            'bank_account_number' => 'nullable|string',
            'bank_name' => 'nullable|string',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus!');
    }
}