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
		   Your parking ticket may be requested by the Justice Board.
	</em></p>


	@foreach($errors->all('<p><span class="error">:message</span></p>') as $error)
		{{ $error }}
	@endforeach
	





	{{ Form::open_for_files('appeal/new', 'POST') }}

	<fieldset>
		<legend>Appellant Information</legend>
		<p>
			Your CWID is: <strong>{{ Session::get('cwid') }}</strong>
		</p>
		<p>
			{{ Form::label('name', 'First Name') }} <span class="details">(No spaces)</span><br>
			{{ Form::text('name', Input::old('name')) }} 
		</p>
		<p>
			{{ Form::label('lastName', 'Last Name') }} <span class="details">(No spaces)</span><br>
			{{ Form::text('lastName', Input::old('lastName')) }} 
		</p>
		<p>
			{{ Form::label('email', 'Email') }}<br>
			{{ Form::text('email', Input::old('email')) }} 
		</p>	
		<p>
			{{ Form::label('permit', 'Marist Parking Permit #') }}<br>
			{{ Form::text('permit', Input::old('permit')) }} 
		</p>
		<p>
			{{ Form::label('lot', 'Assigned Lot') }}<br>
			{{ Form::select('lot', array('1' => 'Lower West', '2' => 'McCann/Sheahan', '3' => 'Upper West/Terminal Rd', '5' => 'Steel Plant', '9' => 'Beck East', '11' => 'Beck West/Fulton', '12' => 'Riverview', '13' => 'Tennis Courts', '16' => 'Gartland', '18' => 'Hoop', '20' => 'North End'), Input::old('lot')) }} 
		</p>

	</fieldset>


	<fieldset>
		<legend>Ticket Information</legend>
		<p>
			{{ Form::label('ticket', 'Ticket #') }}<br>
			{{ Form::text('ticket', Input::old('ticket')) }} 
		</p>
		<p>
			{{ Form::label('fineAmt', 'Fine Amount') }}<span class="details">(As XXX.XX, no $)</span><br>
			{{ Form::text('fineAmt') }} 
		</p>
		<p>
			{{ Form::label('licensePlate', 'License Plate') }} <span class="details">(no dashes, ie: Y12XX3)</span><br>
			{{ Form::text('licensePlate', Input::old('licensePlate')) }} 
		</p>
		<p>
			{{ Form::label('licensePlateState', 'License Plate State') }} <br>
			<select name="licensePlateState" size="1">
			  <option value="AL">Alabama</option>
			  <option value="AK">Alaska</option>
			  <option value="AZ">Arizona</option>
			  <option value="AR">Arkansas</option>
			  <option value="CA">California</option>
			  <option value="CO">Colorado</option>
			  <option value="CT">Connecticut</option>
			  <option value="DE">Delaware</option>
			  <option value="DC">Dist of Columbia</option>
			  <option value="FL">Florida</option>
			  <option value="GA">Georgia</option>
			  <option value="HI">Hawaii</option>
			  <option value="ID">Idaho</option>
			  <option value="IL">Illinois</option>
			  <option value="IN">Indiana</option>
			  <option value="IA">Iowa</option>
			  <option value="KS">Kansas</option>
			  <option value="KY">Kentucky</option>
			  <option value="LA">Louisiana</option>
			  <option value="ME">Maine</option>
			  <option value="MD">Maryland</option>
			  <option value="MA">Massachusetts</option>
			  <option value="MI">Michigan</option>
			  <option value="MN">Minnesota</option>
			  <option value="MS">Mississippi</option>
			  <option value="MO">Missouri</option>
			  <option value="MT">Montana</option>
			  <option value="NE">Nebraska</option>
			  <option value="NV">Nevada</option>
			  <option value="NH">New Hampshire</option>
			  <option value="NJ">New Jersey</option>
			  <option value="NM">New Mexico</option>
			  <option value="NY">New York</option>
			  <option value="NC">North Carolina</option>
			  <option value="ND">North Dakota</option>
			  <option value="OH">Ohio</option>
			  <option value="OK">Oklahoma</option>
			  <option value="OR">Oregon</option>
			  <option value="PA">Pennsylvania</option>
			  <option value="RI">Rhode Island</option>
			  <option value="SC">South Carolina</option>
			  <option value="SD">South Dakota</option>
			  <option value="TN">Tennessee</option>
			  <option value="TX">Texas</option>
			  <option value="UT">Utah</option>
			  <option value="VT">Vermont</option>
			  <option value="VA">Virginia</option>
			  <option value="WA">Washington</option>
			  <option value="WV">West Virginia</option>
			  <option value="WI">Wisconsin</option>
			  <option value="WY">Wyoming</option>
			</select>
		</p>
		<p>
			{{ Form::label('dateIssued', 'Date Issued') }} (YYYY-MM-DD)<br>
			{{ Form::text('dateIssued', Input::old('dateIssued')) }}
		</p>
		<p>
			{{ Form::label('violations', 'Description of Violations') }} <br>
			{{ Form::textarea('violations', Input::old('violations')) }}
		</p>
		<p>
			{{ Form::label('areaOfViolation', 'Area of Violation') }}<br>
			{{ Form::select('areaOfViolation', array('1' => 'Lower West', '2' => 'McCann/Sheahan', '3' => 'Upper West/Terminal Rd', '4' => 'Donnelly', '5' => 'Steel Plant', '6' => 'Byrne', '8' => 'Gate House', '9' => 'Beck East', '10' => 'Mid Rise', '11' => 'Beck West/Fulton', '12' => 'Riverview', '13' => 'Tennis Courts', '14' => 'Dyson, Fontaine, Foy', '16' => 'Gartland', '18' => 'Hoop', '20' => 'North End', '22' => 'St Annes'), Input::old('areaOfViolation')) }} 
		</p>
		<p>
			{{ Form::label('appealLetter', 'Appeal Letter') }} <span class="details">(Word, TXT, or PDF file only. Link or insert any photos directly into document.)</span><br>
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