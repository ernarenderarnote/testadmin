@extends('layouts.app')
@section('content')   
	<users-component :users-data="{{$users}}"></users-component>
@endsection           