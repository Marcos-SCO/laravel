<?php

namespace App\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Country\CountryStore;
use App\Http\Requests\Dashboard\Country\CountryUpdate;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputSearch = $request->get('search');
        $countries =
            $inputSearch ?
            Country::where('country', 'like', '%' . $inputSearch . '%')->paginate(1)
            : Country::orderBy('id', 'DESC')->paginate(1);

        return view('countries.index', [
            'title' => 'Country Dashboard',
            'countries' => $countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStore $request)
    {
        $validated = $request->validated();

        Country::create($validated);

        return redirect()
            ->route('dashboard.country.index')
            ->with('messages', [
                'text' => 'Country successfully registered!'
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
    public function edit(Country $country)
    {
        return view('countries.edit', [
            'country' => $country,
            'title' => 'Edit Country',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUpdate $request, Country $country)
    {
        //
        $validated = $request->validated();
        // $validated['password'] = Hash::make($validated['password']);

        $countryCodeAlreadyTaken = Country::where('code', '=', $validated['code'])->where('code', '!=', $country->code)->exists();

        if ($countryCodeAlreadyTaken)
            return back()->withErrors(['code' => ['Code already taken!']])->withInput();

        $country->update($validated);

        return redirect()
            ->route('dashboard.country.index')
            ->with('messages', [
                'text' => 'Country updated successfully!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('dashboard.country.index')
            ->with('messages',['text' => 'Country deleted!']);
    }
}
