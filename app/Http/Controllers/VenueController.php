<?php

namespace App\Http\Controllers;

class VenueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
	
	public function checkin($venue_id, $attendee_id){
		$data['venue_id'] = $venue_id;
		$data['attendee_id'] = $attendee_id;
		return view('checkin', $data);
	}
}