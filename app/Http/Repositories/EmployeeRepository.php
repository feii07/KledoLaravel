<?php

namespace App\Http\Repositories;
use App\Models\Employee;

class EmployeeRepository
{
    public function createEmployee($employee)
    {
        return $employee->save();
    }

    public function findEmployee($id)
    {
        return Employee::find($id);
    }
}