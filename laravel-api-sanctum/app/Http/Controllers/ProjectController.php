<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentId = auth()->user()->id;

        $projects = Project::where('student_id', '=', $studentId)->get();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Projects',
            'data' => $projects
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();
        $studentId = auth()->user()->id;

        $validated['student_id'] = $studentId;

        Project::create($validated);

        return (new ProjectResource(['status' => Response::HTTP_CREATED, 'message' => 'Project created!']))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentId = auth()->user()->id;
        $project = Project::where(['id' => $id, 'student_id' => $studentId])->get();

        return (new ProjectResource($project));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $studentId = auth()->user()->id;
        $sameStudentID = $studentId === $project->student_id;

        if (!$sameStudentID) {
            return response()->json(['status' => Response::HTTP_UNAUTHORIZED, 'message' => 'Student is not authorized to delete this project'], Response::HTTP_UNAUTHORIZED);
        }

        if ($project->delete()) {
            return response()->json(['status' => Response::HTTP_OK, 'message' => 'Project Deleted']);
        }
    }
}
