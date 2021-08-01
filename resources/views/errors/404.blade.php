

@extends('errors.errors_layout')
@section('title')
	404 - Sorry ! Page Not Found
@endsection
@section('error_content')
	<h2>404</h2>
	<p>Sorry ! Page Not Found</p>
	<p class="mt-2" >
		{{ $exception->getMessage() }}	
	</p>
	<a href="{{route('admin.dashboard')}}">Back to Dashboard</a>
	<a href="{{route('admin.login')}}">Login Again</a>
@endsection