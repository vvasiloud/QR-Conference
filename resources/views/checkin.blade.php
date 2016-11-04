<html>
    <body>
		<div class="container">
			@if (Auth::check())
				<?php echo $venue_id.' '.$attendee_id?>
			@else
                <div class="col-xs-12 text-xs-center">
					<img class="img-fluid" style="width: 300px;" src="{{url('/images/qr.jpg')}}" alt="QR Scan"/>
					<p> Please login <br> before scanning qr code </p>
                </div>
			@endif
		</div>	
    </body>
</html>