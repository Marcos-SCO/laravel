<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return response()->json(['data' => $employees, 'message' => 'Employees data', 'response_code' => Response::HTTP_OK]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $input = $request->all();
        $employeeWasCreated = Employee::create($input);

        $data = $employeeWasCreated ?
            ['message' => 'Employee create successfully', 'response_code' => Response::HTTP_CREATED] : ['message' => 'Employee could not be created', 'response_code' => Response::HTTP_BAD_REQUEST];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $data = $employee ?
            ['data' => $employee, 'message' => 'Employee returned successfully', 'response_code' => Response::HTTP_OK] : ['message' => 'Employee not founded', 'response_code' => Response::HTTP_NOT_FOUND];

        return response()->json($data);
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
        $employee = Employee::find($id);
        if (!$employee) return response()->json(['message' => 'Employee not founded', 'response_code' => Response::HTTP_NOT_FOUND]); 

        $updatedSuccessfully = $employee->update($request->all());

        $data = $updatedSuccessfully ?
            ['message' => 'Employee updated successfully', 'response_code' => Response::HTTP_OK] :
            ['message' => 'Employee could not be update', 'response_code' => Response::HTTP_NOT_MODIFIED];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) return response()->json(['message' => 'Employee not founded', 'response_code' => Response::HTTP_NOT_FOUND]); 

        $deleteSuccessfully = $employee->delete();

        $data = $deleteSuccessfully ?
            ['message' => 'Employee deleted successfully', 'response_code' => Response::HTTP_OK] :
            ['message' => 'Employee could not be deleted', 'response_code' => Response::HTTP_NOT_MODIFIED];

        return response()->json($data);
    }
}
