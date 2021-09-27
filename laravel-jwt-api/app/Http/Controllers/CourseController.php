<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseStoreRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $courses = User::find($id)->courses;

        return response()->json(['message' => Response::HTTP_OK, 'message' => 'Total courses Enrolled', 'data' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $courseData = $request->validated();
        $courseData['user_id'] = auth()->user()->id;

        Course::create($courseData);

        return response()->json([
            'status' => Response::HTTP_CREATED,
            'message' => 'Course created',
            'data' => $courseData
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $userId = auth()->user()->id;

        $courseExists = Course::where(['id' => $course->id, 'user_id' => $userId])->exists();

        if (!$courseExists) {
            return response()->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'Not Founded'], Response::HTTP_NOT_FOUND);
        }

        $course->delete();

        return response()->json(['status' => Response::HTTP_OK, 'message' => 'Course deleted successfully'], Response::HTTP_OK);
    }
}
