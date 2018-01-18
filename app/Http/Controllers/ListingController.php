<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function home()
    {
        $data = Listing::all([
            'id',
            'address',
            'title',
            'price_per_night',
        ])
        ->transform(function ($listing) {
            $listing->thumb = asset("images/{$listing->id}/Image_1_thumb.jpg");
            return $listing;
        });

        $data = collect(['listings' => $data]);
        $data = $this->add_meta_data($data, request());

        return view('app');
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $data = $this->get_listing($listing);

        $data = $this->add_meta_data($data, request());

        return view('app');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }

    private function get_listing($listing)
    {
        foreach (range(1,4) as $i) {
            $listing["image_{$i}"] = asset("images/{$listing->id}/Image_{$i}.jpg");
        }

        return collect(['listing' => $listing]);
    }

    private function add_meta_data($collection, $request)
    {
        return $collection->merge([
            'path' => $request->getPathInfo()
        ]);
    }
}