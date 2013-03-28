@layout('layouts.default')

@section('content')

	<h1>
		Reviewing Ticket {{ $appeals->ticketid }}
	</h1>
	<table id="resultsTable">
		<tr>
			<th>Ticket ID</th> 
			<td>{{ $appeals->ticketid }}</td>
		</tr>
		<tr>
			<th>Ticket Issued</th> 
			<td>{{ $appeals->dateissued }}</td>
		</tr>
		<tr>
			<th>Name</th> 
			<td>{{ $appeals->name }} {{ $appeals->lastname }}</td>
		</tr>
		<tr>
			<th>License Plate</th> 
			<td>{{ $appeals->licenseplate }}</td>
		</tr>
		<tr>
			<th>Violations</th> 
			<td>{{ e($appeals->violations) }}</td>
		</tr>
		<tr>
			<th>Fine Amount</th> 
			<td>{{ e($appeals->fineamt) }}</td>
		</tr>
		<tr>
			<th>Permit Number</th> 
			<td>{{ $appeals->permitnumber }}</td>
		</tr>
		<tr>
			<th>Appeal Letter</th>
			<td>{{HTML::link($appeals->letterlocation, 'View Letter')}} </td>
		</tr>
		<tr>
			<th>Submitted on</th>
			<td>{{ $appeals->created_at}}</td>
		</tr>
	</table>

	<h1>Justice Board Decision</h1>

	{{ Form::open('jboard/review', 'POST') }}

	<fieldset>
		<legend>Decision</legend>

	<p>
		{{ Form::label('decision', 'Appeal Decision')}}<br>
		{{ Form::select('decision', array('approved' => 'Appeal Approved', 'partial' => 'Partial Approval (specify)', 'denied' => 'Appeal Denied')) }} <i>{{ $errors->first('decision') }}</i>
	</p>
		<br>
	<p>
		{{ Form::label('denyreason', 'Reason for Denial') }} (Leave blank if not denied) <br>
		{{ Form::select('denyreason', array('none' => '', 'incomplete'       => 'Incomplete/Illegible', 'past'         => 'Past Due', 'nobasis'      => 'No Basis for Appeal', 'insufficient' => 'Insufficient Evidence','other'        => 'Other (specify)'), 0) }} <i>{{ $errors->first('denyreason') }}</i>
	</p>

	<p>
		{{ Form::label('amtreduce', 'Amount Fine is Reduced')}} (as XXX.XX, no $ sign) <br>
		{{ Form::text('amtreduce') }} <i>{{ $errors->first('amtreduce') }}</i>
	</p>

	<p>
		{{ Form::label('initials', 'Authorized Initials')}} <br>
		{{ Form::text('initials') }} <i>{{ $errors->first('intials') }}</i>
	</p>

	<p>
		{{ Form::label('details', 'Provide Details or Comments for Ruling') }} <i>{{ $errors->first('details') }}</i>
		{{ Form::textarea('details')}} 
	</p>

	{{ Form::hidden('ticketid', $appeals->ticketid) }}
	{{ Form::hidden('cwid', $appeals->cwid) }}
	{{ Form::submit('Submit Decision', array('id' => 'submit'))}}
	{{ Form::close() }}

	</fieldset>
	 
@endsection	

@section('navigation')
    @parent
    <p><strong>JBoard Panel</strong></p>
    <p><a href="{{ URL::to_action('jboard@index') }}">Home</a></p>
    <p><a href="{{ URL::to_action('jboard@openappeals') }}">Review Open Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@closedappeals') }}">Review Closed Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@report') }}">Generate Report</a></p>
@endsection
