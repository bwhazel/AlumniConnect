@layout('layouts.master')

@section('title')
	<h1>Dashboard</h1>
@endsection

@section('content')
<h1>Home Page</h1>

@if(Session::has('message'))
	{{ Session::get('message') }}	        
@endif

@endsection
