<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Customers;
use App\Models\Movies;
use App\Models\Rentals;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Addresses::with(['rentals.movies', 'customers'])->get();
        return view('rental.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movies::all();
        $addresses = Addresses::with('customers')->get();

        return view('rental.create', compact('movies', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'movie_id' => 'required|exists:movies,id'
        ]);

        Rentals::create([
            'address_id' => $request->address_id,
            'movie_id' => $request->movie_id
        ]);

        return redirect()->route('rental.index')->with('success', 'Rent transcation saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
