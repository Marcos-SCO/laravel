<?php

namespace App\Http\Controllers\Backend\State;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\State\StateSend;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputSearch = $request->get('search');
        $states =
            $inputSearch ?
            State::where('name', 'like', '%' . $inputSearch . '%')->paginate(1)
            : State::orderBy('id', 'DESC')->paginate(1);

        return view('states.index', [
            'title' => 'State Dashboard',
            'states' => $states,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('states.create', [
            'title' => 'Create a state',
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateSend $request)
    {
        $validated = $request->validated();

        State::create($validated);

        return redirect()
            ->route('dashboard.state.index')
            ->with('messages', [
                'text' => 'State successfully registered!'
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
    public function edit(State $state)
    {
        $countries = Country::all();

        return view('states.edit', [
            'state' => $state,
            'countries' => $countries,
            'title' => 'Edit State',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateSend $request, State $state)
    {
        $validated = $request->validated();

        $state->update($validated);

        return redirect()
            ->route('dashboard.state.index')
            ->with('messages', [
                'text' => 'State updated successfully!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('dashboard.state.index')
            ->with('messages',['text' => 'State deleted!']);
    }
}
