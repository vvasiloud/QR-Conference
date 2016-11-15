<?php

namespace App\Http\Controllers;
use App\Models\AttendeeActivity;
use App\Models\Attendee;
use App\Models\Venue;
use App\Models\Auditorium;

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
	
	public function checkin($venue, $attendee){
		$action = '';

		$attendee_id = $attendee->id;
		$attendeeName = $attendee->name;
		$venue_id = $venue->id;
		$venueName = $venue->name;
		//$auditorium_id = $auditorium->id;
		//$auditoriumName = $auditorium->name;

		$lastActivity = AttendeeActivity::where('attendee_id', $attendee_id)->where('venue_id', $venue_id)->orderBy('updated_at', 'desc')->first();
		if($lastActivity){
			$action = ($lastActivity->action == 'checkin') ? 'checkout' : 'checkin';
		}
		
        $attendeeActivity = new AttendeeActivity;
		$attendeeActivity->attendee_id = $attendee_id;
        $attendeeActivity->venue_id = $venue_id;
        $attendeeActivity->auditorium_id = 1;
		$attendeeActivity->action = ($action != '') ? $action : 'checkin';
        $attendeeActivity->save();
		
		$data['attendee_id'] = $attendee_id;		
		$data['attendee_name'] = $attendeeName;
		$data['attendee_action'] = $action;
		$data['venue_id'] = $venue_id;
		$data['venue_name'] = $venueName;
		//$data['auditorium_name'] = $auditoriumName;
		
		return view('checkin', $data);
	}
}