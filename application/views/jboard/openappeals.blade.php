@layout('layouts.default')

@section('content')

	<h1>Open Appeals</h1>

	@foreach($openappeals as $openappeal)

		<p>{{HTML::link('jboard/review/'.$openappeal->ticketid, 'View Ticket')}} - Ticket # {{ $openappeal->ticketid }}<br></p>

	@endforeach


@endsection
@section('navigation')
    @parent
    <p><strong>JBoard Panel</strong></p>
    <p><a href="{{ URL::to_action('jboard@index') }}">Home</a></p>
    <p><a href="{{ URL::to_action('jboard@openappeals') }}">Review Open Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@closedappeals') }}">Review Closed Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@report') }}">Generate Report</a></p>
@endsection