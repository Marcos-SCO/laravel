<?php

namespace App\Http\Controllers\Backend\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Department\DepartmentSend;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputSearch = $request->get('search');
        $departments =
            $inputSearch ?
            Department::where('name', 'like', '%' . $inputSearch . '%')->paginate(1)
            : Department::orderBy('id', 'DESC')->paginate(1);

        return view('departments.index', [
            'title' => 'Department Dashboard',
            'departments' => $departments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentSend $request)
    {
        $validated = $request->validated();

        $departmentAlreadyTaken = Department::where('name', '=', strtoLower($validated['name']))
            ->exists();

        if ($departmentAlreadyTaken)
            return back()->withErrors(['name' => ['Department name already taken!']])->withInput();

        Department::create($validated);

        return redirect()
            ->route('dashboard.department.index')
            ->with('messages', [
                'text' => 'Department successfully registered!'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', [
            'department' => $department,
            'title' => 'Edit Department',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentSend $request, Department $department)
    {
        //
        $validated = $request->validated();
        // $validated['password'] = Hash::make($validated['password']);

        $departmentNameAlreadyTaken = Department::where('name', '=', strtolower($validated['name']))
            ->where('id', '!=', $department->id)->exists();

        if ($departmentNameAlreadyTaken)
            return back()->withErrors(['name' => ['Department name already taken!']])->withInput();

        $department->update($validated);

        return redirect()
            ->route('dashboard.department.index')
            ->with('messages', [
                'text' => 'Department updated successfully!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('dashboard.department.index')
            ->with('messages', ['text' => 'Department deleted!']);
    }
}
