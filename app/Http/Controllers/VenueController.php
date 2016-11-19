<?php

namespace App\Http\Controllers;
use App\Models\AttendeeActivity;
use App\Models\Attendee;
use App\Models\Venue;
use App\Models\Auditorium;
use DB;

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
		$data =[];
		if(\Auth::check()){
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
		}
		return view('checkin', $data);
	}
	
	public function massCheckout($venue){
		$data =[];
		if(\Auth::check()){
			$venue_id = $venue->id;
			$attendeeArray = [];
			
			$lastAttendeeActivities = AttendeeActivity::select(DB::raw('MAX(updated_at) AS updated_at'), 'attendee_id','action', DB::raw('MAX(id) AS id'))
									->where('venue_id', $venue_id)
									->groupBy('attendee_id','action')
									->orderBy('attendee_id','asc')->orderBy('updated_at','asc')
									->get();
			$keyed = $lastAttendeeActivities->keyBy('attendee_id');

			foreach ($keyed as $attendee):
				if($attendee->action == 'checkin'):
					$attendeeActivity = new AttendeeActivity;
					$attendeeActivity->attendee_id = $attendee->attendee_id;
					$attendeeActivity->venue_id = $venue_id;
					$attendeeActivity->auditorium_id = 1;
					$attendeeActivity->action = 'checkout';
					$attendeeActivity->save();
					$attendeeArray[] = $attendeeActivity;
				endif;
			endforeach;

			if($attendeeArray){
				$data['checkoutAttendees'] = $attendeeArray;
			}
			return view('masscheckout', $data);
		}
	}
}