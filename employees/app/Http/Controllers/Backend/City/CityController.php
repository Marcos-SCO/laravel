<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\CitySend;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city = new City;

        $inputSearch = $request->get('search');
        $cities =
            $inputSearch ?
            City::where('name', 'like', '%' . $inputSearch . '%')->paginate(1)
            : City::orderBy('id', 'DESC')->paginate(1);

        return view('cities.index', [
            'title' => 'City Dashboard',
            'cities' => $cities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();

        return view('cities.create', [
            'title' => 'Create a state',
            'states' => $states
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitySend $request)
    {
        $validated = $request->validated();

        $cityAlreadyTaken = City::where('name', '=', strtoLower($validated['name']))
        ->where('state_id', '=', $validated['state_id'])
        ->exists();

        if ($cityAlreadyTaken)
            return back()->withErrors(['name' => ['City name already taken!']])->withInput();

        City::create($validated);

        return redirect()
            ->route('dashboard.city.index')
            ->with('messages', [
                'text' => 'City successfully registered!'
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
    public function edit(City $city)
    {
        $states = State::all();

        return view('cities.edit', [
            'city' => $city,
            'states' => $states,
            'title' => 'Edit City',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitySend $request, City $city)
    {
        $validated = $request->validated();

        $cityAlreadyTaken = City::where('name', '=', strtolower($validated['name']))
            ->where('id', '!=', $city->id)
            ->where('state_id', '=', $city->state_id)
            ->exists();

        if ($cityAlreadyTaken)
            return back()->withErrors(['name' => ['City name already taken!']])->withInput();


        $city->update($validated);

        return redirect()
            ->route('dashboard.city.index')
            ->with('messages', [
                'text' => 'City updated successfully!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('dashboard.city.index')
            ->with('messages', ['text' => 'City deleted!']);
    }
}
