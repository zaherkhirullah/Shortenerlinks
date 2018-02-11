<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\campaign_items;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CampaignItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
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
     * @param  \App\campaign_items  $campaign_items
     * @return \Illuminate\Http\Response
     */
    public function show(campaign_items $campaign_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campaign_items  $campaign_items
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_items $campaign_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campaign_items  $campaign_items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign_items $campaign_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campaign_items  $campaign_items
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign_items $campaign_items)
    {
        //
    }
}
