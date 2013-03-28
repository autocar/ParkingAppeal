@layout('layouts.default')

@section('header')
	@parent
	<script>
	 $(function() {
	 	$( "#dateIssued" ).datepicker({ altFormat: "yyyy-mm-dd" });
	});
	</script>
@endsection

@section('content')

	<h1>Submit A New Appeal</h1>
	<p>All fields are required</p>
	<p><em>Note: All appeals must be submitted within 10 calendar days of ticket issuance.<br>
			Your parking ticket may be requested by the Justice Board.</em></p>



	{{ $errors->has('name') ? '<p><span class="error">'. $errors->first('name') .'</span></p>' : ''}}
	{{ $errors->has('lastName') ? '<p><span class="error">'. $errors->first('lastName') .'</span></p>' : ''}}
	{{ $errors->has('permit') ? '<p><span class="error">'. $errors->first('permit') .'</span></p>' : ''}}
	{{ $errors->has('msc') ? '<p><span class="error">'. $errors->first('msc') .'</span></p>' : ''}}
	{{ $errors->has('appealLetter') ? '<p><span class="error">'. $errors->first('appealLetter') .'</span></p>' : ''}}
	{{ $errors->has('violations') ? '<p><span class="error">'. $errors->first('violations') .'</span></p>' : ''}}
	{{ $errors->has('areaOfViolation') ? '<p><span class="error">'. $errors->first('areaOfViolation') .'</span></p>' : ''}}
	{{ $errors->has('lot') ? '<p><span class="error">'. $errors->first('lot') .'</span></p>' : ''}}
	{{ $errors->has('ticket') ? '<p><span class="error">'. $errors->first('ticket') .'</span></p>' : ''}}
	{{ $errors->has('licensePlate') ? '<p><span class="error">'. $errors->first('licensePlate') .'</span></p>' : ''}}
	{{ $errors->has('licensePlateState') ? '<p><span class="error">'. $errors->first('licensePlateState') .'</span></p>' : ''}}



	{{ Form::open_for_files('appeal/new', 'POST') }}

	<fieldset>
		<legend>Appellant Information</legend>
		<p>
			Your CWID is: <strong>{{ Session::get('cwid') }}</strong>
		</p>
		<p>
			{{ Form::label('name', 'First Name') }} <span class="details">(No spaces)</span><br>
			{{ Form::text('name') }} 
		</p>
		<p>
			{{ Form::label('lastName', 'Last Name') }} <span class="details">(No spaces)</span><br>
			{{ Form::text('lastName') }} 
		</p>	
		<p>
			{{ Form::label('permit', 'Marist Parking Permit #') }}<br>
			{{ Form::text('permit') }} 
		</p>
		<p>
			{{ Form::label('lot', 'Assigned Lot') }} <span class="details">(Lot number only)</span><br>
			{{ Form::select('lot', array('1' => 'Lower West', '2' => 'McCann/Sheahan', '3' => 'Upper West/Terminal Rd', '5' => 'Steel Plant', '9' => 'Beck East', '11' => 'Beck West/Fulton', '12' => 'Riverview', '13' => 'Tennis Courts', '16' => 'Gartland', '18' => 'Hoop', '20' => 'North End')) }} 
		</p>
		<p>
			{{ Form::label('msc', 'MSC #') }}<br>
			{{ Form::text('msc') }} 
	</fieldset>


	<fieldset>
		<legend>Ticket Information</legend>
		<p>
			{{ Form::label('ticket', 'Ticket #') }}<br>
			{{ Form::text('ticket') }} 
		</p>
		<p>
			{{ Form::label('fineAmt', 'Fine Amount') }}<span class="details">(As XXX.XX, no $)</span><br>
			{{ Form::text('fineAmt') }} 
		</p>
		<p>
			{{ Form::label('licensePlate', 'License Plate') }} <span class="details">(no dashes, ie: Y12XX3)</span><br>
			{{ Form::text('licensePlate') }} 
		</p>
		<p>
			{{ Form::label('licensePlateState', 'License Plate State') }} <span class="details">(2 letter abbreviation)</span><br>
			{{ Form::text('licensePlateState') }} 
		</p>
		<p>
			{{ Form::label('dateIssued', 'Date Issued') }} (YYYY-MM-DD)<br>
			{{ Form::text('dateIssued') }}
		</p>
		<p>
			{{ Form::label('violations', 'Description of Violations') }} <br>
			{{ Form::textarea('violations') }}
		</p>
		<p>
			{{ Form::label('areaOfViolation', 'Area of Violation') }} <span class="details">(Name or lot ID)</span><br>
			{{ Form::text('areaOfViolation') }} 
		</p>
		<p>
			{{ Form::label('appealLetter', 'Appeal Letter') }} <span class="details">(Word, TXT, or PDF file only. Upload and link any photos or insert directly into document.)</span><br>
			{{ Form::file('appealLetter') }}
		</p>
	</fieldset>

		<p>
			Submitting this form constitutes agreement to the Marist Parking Appeals Terms &amp; Conditions</p>
			<textarea cols="80" rows="5" disabled="disabled">
The intentional providing of false or inaccurate information is a violation of College policy as stated in the Code of Student Conduct. All decisions of the Judicial Board regarding parking ticket appeals are final and cannot be considered, discussed, or appealed further. All interactions between the appellant and the Judicial Board shall be conducted via the Parking Ticket Appeal process only and any form of verbal communication with the Judicial Board regarding parking ticket appeals will not be entertained. Abuse of the parking ticket appeal process or anyone involved will not be tolerated and may affect eligibility to participate in the parking ticket appeal process. Decision notification must be obtained by logging in the Online Parking Appeal system fourteen (14) days after the date of submission. 

I hereby certify that all information provided for consideration is true and accurate to the best of my knowledge and belief. I have read, understand, and agree to be bound by all of the information, directions, and requirements set forth herein which together constitute the terms and conditions of appeal. I understand that failure to comply with any of the terms and conditions of appeal will result in the denial of my appeal. 

</textarea>

	<p>
		See also: <a href="http://www.marist.edu/security/policies.html#parking" target="_blank">Office of Security's Parking Policy</a>
	</p>
		
	<p>
		{{ Form::submit('Submit Appeal', array('id' => 'submit'))}}
	</p>

@endsection