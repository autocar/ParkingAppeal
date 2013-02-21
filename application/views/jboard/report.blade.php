@layout('layouts.default')

@section('content')

	<h1>Generate Report</h1>

	{{ Form::open('jboard/report', 'POST') }}

	<p>Press the button below to generate a report of all appealed parking tickets for the past week. The report will contain Ticket IDs and CWIDs.</p>

	<p>The last report was generated on: <strong> {{ date('F j, Y', strtotime($lastsubmit->lastsubmit))}} </strong> </p>

	<p>Please send this report to Security weekly.</p>

	{{ Form::submit('Generate Report', array('id' => 'generate'))}}

	{{ Form::close() }}

@endsection
@section('navigation')
    @parent
    <p><strong>JBoard Panel</strong></p>
    <p><a href="{{ URL::to_action('jboard@index') }}">Home</a></p>
    <p><a href="{{ URL::to_action('jboard@openappeals') }}">Review Open Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@closedappeals') }}">Review Closed Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@report') }}">Generate Report</a></p>
@endsection