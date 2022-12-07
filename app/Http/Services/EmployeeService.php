<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\EmployeeRepository;
use App\Models\Employee;

class EmployeeService
{
    private $employeeRepository;

    public function __construct()
    {
        $this->employeeRepository = new EmployeeRepository();
    }

    public function createEmployee($req)
    {
        $input = $req->all();
        $rule = [
            'name' => 'required',
            'salary' => 'required',
        ];
        $message = [
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make($input, $rule, $message);

        if ($validator->fails()) {
            $response = array(
                'status' => 500,
                'data' => $validator->errors(),
            );
        }else{
            $employee = new Employee();
            $employee->name = $req->name;
            $employee->salary = $req->salary;
            $this->employeeRepository->createEmployee($employee);

            $response = array(
                'status' => 200,
                'data' => $this->employeeRepository->findEmployee($employee->id),
            );
        }
        return response()->json($response);
    }
}