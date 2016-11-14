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
	
	public function checkin($venue_id, $attendee_id){
		$action = '';

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
		
		$attendeeName = Attendee::find($attendee_id)->name;
		//$auditoriumName = Auditorium::find($auditorium_id)->name;
		$venueName = Venue::find($venue_id)->name;
		
		$data['venue_id'] = $venue_id;
		$data['attendee_id'] = $attendee_id;		
		$data['attendee_name'] = $attendeeName;
		$data['attendee_action'] = $action;
		//$data['auditorium_name'] = $auditoriumName;
		$data['venue_name'] = $venueName;

		
		return view('checkin', $data);
	}
}