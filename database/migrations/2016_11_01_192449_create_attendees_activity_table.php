<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendeesActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_attendees', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('attendee_id')->unsigned();
			$table->integer('venue_id')->unsigned();
            $table->integer('auditorium_id')->unsigned();
				
            $table->foreign('attendee_id')
                ->references('id')
                ->on('attendees')
                ->onDelete('cascade');
				
			$table->foreign('venue_id')
                ->references('id')
                ->on('venues')
                ->onDelete('cascade');
				
			$table->foreign('auditorium_id')
                ->references('id')
                ->on('auditoriums')
                ->onDelete('cascade');
				
			$table->string('action');
				
            $table->primary(['id','attendee_id', 'venue_id', 'auditorium_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_attendees');
    }
}
