@layout('layouts.default')

@section('content')

	@if(empty($appeals))
		<p>You haven't submitted any appeals. Please go here to submit an appeal: <a href="{{ URL::to_action('appeal@new') }}">New Appeal</a></p>
	@else

		<p>Appeals that are {{ HTML::image('img/icn/plus-shield.png', 'open') }} OPEN have not been reviewed by the Justice Board. <br> Appeals that are {{ HTML::image('img/icn/minus-shield.png', 'minus') }} CLOSED have been reviewed and decided upon by the Justice Board. </p>
		<table class="myappealTable">
			<tr>
				<th class="myappealTable"></th> <th class="myappealTable">Ticket ID</th> <th class="myappealTable">Status</th>
			</tr>
		@foreach ($appeals as $appeal)
			<tr> 
				<td class="myappealTable">
					{{ HTML::image('img/icn/document--arrow.png', 'View') }}{{HTML::link('appeal/review/'.$appeal->ticketid, 'View Ticket')}}
				</td>
				<td class="myappealTable">
					{{ $appeal->ticketid }}
				</td>
				<td class="myappealTable">
					@if ( $appeal->appealstatus > 0)
						{{ HTML::image('img/icn/minus-shield.png', 'closed') }} Closed
					@else
						{{ HTML::image('img/icn/plus-shield.png', 'open') }} Open
					@endif
				</td>
			</tr>
		@endforeach

	</table>
	@endif
@endsection