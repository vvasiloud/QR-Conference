@include('partials.head')
    <body>
		<div class="container">
			@if (Auth::check())
				<div class="col-xs-12 text-xs-center">
					<p class="user--checkin"><?php echo $attendee_action . ' for ' . $attendee_name . ' (#' . $attendee_id . ') <br>' . ' in '.$venue_name?></p>
				</div>
			@else
				@include('partials.login-notice');
			@endif
		</div>	
    </body>
@include('partials.footer')