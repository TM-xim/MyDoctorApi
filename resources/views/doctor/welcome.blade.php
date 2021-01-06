@extends('layouts.doctor')

@section('content')

@if(session('successful_message'))
	<div class="alert alert-success">
		{{ session('successful_message') }}
	</div>
@endif

<h2>Welcome doctor</h2>
@endsection
