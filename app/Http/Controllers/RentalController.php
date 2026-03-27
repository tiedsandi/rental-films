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

        $rentalsByAddress = Rentals::all()
            ->groupBy('address_id')
            ->map(fn($rentals) => $rentals->pluck('movie_id')->values());

        return view('rental.create', compact('movies', 'addresses', 'rentalsByAddress'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_id'   => 'required|exists:addresses,id',
            'movie_id'     => 'required|array|min:1',
            'movie_id.*'   => 'exists:movies,id',
        ]);

        Rentals::where('address_id', $request->address_id)->delete();

        $inserts = [];
        foreach ($request->movie_id as $movieId) {
            $inserts[] = [
                'address_id' => $request->address_id,
                'movie_id'   => $movieId,
            ];
        }

        Rentals::insert($inserts);

        return redirect()->route('rental.index')->with('success', 'Rent transaction saved successfully.');
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
