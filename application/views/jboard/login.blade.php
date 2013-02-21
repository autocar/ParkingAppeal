@layout('layouts.default')

@section('content')

	<h1>Log-in to JBoard Panel</h1>
	
	{{ Form::open('appeal/new', 'POST') }}

	<h2>Appellant Information</h2>
	<p>
		{{ Form::label('cwid', 'CWID') }}<br>
		{{ Form::text('cwid') }} <i>{{ $errors->first('cwid') }}</i>
	</p>
	<p>
		{{ Form::label('password', 'Password') }}<br>
		{{ Form::password('lastName') }} <i>{{ $errors->first('password') }}</i>
	</p>	

		{{ Form::submit('Login')}}
	</p>

@endsection