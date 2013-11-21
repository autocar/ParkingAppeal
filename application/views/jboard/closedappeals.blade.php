@layout('layouts.default')

@section('content')

	<h1>Closed Appeals</h1>

    {{ $openappeals->links() }}

    <table>
        <tr style="border:solid 1px #000;">
            <th> </th>
            <th>Ticket Number</th>
            <th>Ruling Date</th>
        </tr>
    @foreach($openappeals->results as $openappeal)

        <tr>
            <td style="padding:5px;">{{HTML::link('jboard/reviewclosed/'.$openappeal->ticketid, 'View Ticket')}}</td>
            <td style="padding:5px;"># {{ $openappeal->ticketid }}</td>
            <td style="padding:5px;">{{ date("d-M-Y", strtotime($openappeal->created_at)) }}</td>
        </tr>
    @endforeach

    </table>

    {{ $openappeals->links() }}


@endsection
@section('navigation')
    @parent
    <p><strong>JBoard Panel</strong></p>
    <p><a href="{{ URL::to_action('jboard@index') }}">Home</a></p>
    <p><a href="{{ URL::to_action('jboard@openappeals') }}">Review Open Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@closedappeals') }}">Review Closed Appeals</a></p>
    <p><a href="{{ URL::to_action('jboard@report') }}">Generate Report</a></p>
@endsection