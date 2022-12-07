<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeService;

    public function __construct()
    {
        $this->employeeService = new EmployeeService();
    }

    public function createEmployee(Request $req)
    {
        return $this->employeeService->createEmployee($req);
    }
}
