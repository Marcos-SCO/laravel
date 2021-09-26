<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentStoreRequest;
use App\Http\Requests\Student\StudentLoginRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Student\StudentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        $student = Student::create($validated);

        // return response()->json($validated, Response::HTTP_OK);

        return new StudentResource($validated, Response::HTTP_CREATED);
    }

    /**
     * Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(StudentLoginRequest $request)
    {
        $validated = $request->validated();

        $student = Student::where('email', '=', $validated['email'])->first();

        if (!isset($student->id)) {
            return (new StudentResource(['status' => Response::HTTP_NOT_FOUND, 'message' => 'Student not Found']))
                ->response()
                ->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $passwordCheck = Hash::check($validated['password'], $student->password);

        if (!$passwordCheck) {
            return (new StudentResource(['status' => Response::HTTP_UNAUTHORIZED, 'message' => 'Incorrect email or password']))
                ->response()
                ->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        $token = $student->createToken('auth_token')->plainTextToken;

        return (new StudentResource(['status' => Response::HTTP_ACCEPTED, 'message' => 'Student logged in successfully', 'access_token' => $token]))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
