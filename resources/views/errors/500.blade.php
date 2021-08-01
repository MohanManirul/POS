

@extends('errors.errors_layout')
@section('title')
	500 - Opps ! Internal Server Error
@endsection
@section('error_content')
	<h2>500</h2>
	<p>Opps ! Internal Server Error</p>
	<p class="mt-2" >
		{{ $exception->getMessage() }}	
	</p>
	<a href="{{route('admin.dashboard')}}">Back to Dashboard</a>
	<a href="{{route('admin.login')}}">Login Again</a>
@endsection