@layout('layouts.default')

@section('content')

	<h1>Welcome to the JBoard Admin Panel</h1>

	<p>Number of appeals awaiting decision: <a href="{{ URL::to_action('jboard@openappeals') }}">{{ $openAppeals }}</a></p>

	<p>Number of appeals closed: <a href="{{ URL::to_action('jboard@closedappeals') }}">{{ $closedAppeals }}</a></p>

	<p>
		<span class="notice"><b>REMEMBER:</b> Generate an appeal report once a week and send to Security/John Gildard</span>
	</p>

@endsection
@section('navigation')
    @parent
    <p><strong>JBoard Panel</strong></p>
    <p><a href="{{ URL::to_action('jboard@index') }}">Home</a></p>
    <p><a href="{{ URL::to_action('jboard@openappeals') }}">Review Open Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@closedappeals') }}">Review Closed Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@report') }}">Generate Report</a></p>
@endsection