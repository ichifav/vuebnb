<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingApiController extends Controller
{
    public function home()
    {
        $data = $this->get_listing_summaries();
        return $this->add_meta_data($data);
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
        foreach (range(1,4) as $i) {
            $listing["image_{$i}"] = asset("images/{$listing->id}/Image_{$i}.jpg");
        }

        $data = collect(['listing' => $listing]);
        return $this->add_meta_data($data);
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


    private function get_listing_summaries()
    {
        $collection = Listing::all([
            'id',
            'address',
            'title',
            'price_per_night',
        ])
        ->transform(function ($listing) {
            $listing->thumb = asset("images/{$listing->id}/Image_1_thumb.jpg");
            return $listing;
        });

        return collect(['listings' => $collection]);
    }

    private function add_meta_data($collection)
    {
        return $collection->merge([
            'auth' => Auth::check()
        ]);
  }
}
