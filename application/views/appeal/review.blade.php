@layout('layouts.default')

@section('content')

	
	<h1>
		Reviewing Ticket {{ $appeals->ticketid }}
	</h1>

	<p>Please print this page for your records.</p>

	<table id="resultsTable">
		<tr>
			<th>Ticket ID</th> 
			<td>{{ $appeals->ticketid }}</td>
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
			<th>Permit Number</th> 
			<td>{{ $appeals->permitnumber }}</td>
		</tr>
		<tr>
			<th>Appeal Status</th>

					@if ( $appeals->appealstatus > 0)
						<td>Closed!</td>
					@else
						<td>Open!</td>
					@endif
		
		</tr>
		<tr>
			<th>Submitted on</th>
			<td>{{ $appeals->created_at}}</td>
		</tr>
	</table>

	@if(empty($rulings))
		<span></span>
	@else
		<h1>Judicial Board Ruling</h1>

		<table id="resultsTable">
			<tr>
				<th>Appeal Ruling</th>
				@if($rulings->decision == 'denied')
					<td class="denied"> {{ $rulings->decision }} </td>
				@elseif($rulings->decision == 'partial')
					<td class="partial"> {{ $rulings->decision }} </td>
				@else
					<td class="approved"> {{ $rulings->decision }} </td>
				@endif
				
			</tr>

			@if($rulings->decision == 'denied')
				<tr>
					<th>Appeal Ruling</th>
					<td> {{ $denyReason }} </td>
				</tr>
			@endif

			<tr>
				<th>Reasoning</th>
				<td> {{ e($rulings->reasoning) }} </td>
			</tr>
			<tr>
				<th>Amount Fine Reduced By</th>
				<td> ${{ $rulings->amtreduce }} </td>
			</tr>
			<tr>
				<th>Decision Date &amp; Time</th>
				<td> {{ $rulings->created_at }} </td>
			</tr>
		</table>
	@endif


	 
@endsection