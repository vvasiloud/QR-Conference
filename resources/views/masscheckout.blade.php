@include('partials.head')
    <body>
		<div class="container">
			@if (Auth::check())
				<div class="col-xs-12 text-xs-center">
					@if( !empty($checkoutAttendees) )
						@foreach ($checkoutAttendees as $attendee)
							<p>Checkout for attendee with id #{{ $attendee->attendee_id }}</p>
						@endforeach
					@else
						No attendees to checkout! :)
					@endif
				</div>
			@else
				@include('partials.login-notice');
			@endif
		</div>	
    </body>
@include('partials.footer')