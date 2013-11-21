@layout('layouts.default')

@section('content')

	<h1>Welcome to the Online Parking Ticket Appeal System!</h1>

	<p class="homebtns">
		<a class="homepageButton" href="{{ URL::to_action('appeal@new') }}">
			New Appeal
		</a>
		&nbsp;&nbsp;
		<a class="homepageButton" href="{{ URL::to_action('appeal@myappeals') }}">
			My Appeals
		</a>
	</p>

	<p><strong>Note:</strong> All parking appeals can take up to fourteen (14) calendar days before a decision is made.</p>

	<p>Before submitting an appeal, please review the <a href="http://www.marist.edu/security/policies.html#parking" target="_blank">Office of Security's Parking Policy</a>
	</p>

	<p>If you encounter any errors or need assistance, please contact the <a href="http://clubs.marist.edu/itc/" target="_blank">Student Government CIO</a> or Chief Justice.</p>
 


@endsection