<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class AttendeeActivity extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'activity_attendees';
	protected $primaryKey = 'id';
	// public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = ['attendee_id','action','venue_id','auditorium_id'];
	// protected $hidden = [];
    // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	public function getAttendeeNameAttribute(){
		return $this->attendee->name;
	}

	public function getVenueNameAttribute(){
		return $this->venue->name;
	}

	public function getAuditoriumNameAttribute(){
		return $this->auditorium->name;
	}	
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	public function attendee()
    {
        return $this->belongsTo('App\Models\Attendee', 'attendee_id');
    }
	
	public function venue()
    {
        return $this->belongsTo('App\Models\Venue', 'venue_id');
    }
	
	public function auditorium()
    {
        return $this->belongsTo('App\Models\Auditorium', 'auditorium_id');
    }
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
