@extends('theme')
@section('content')
@if(auth()->user()->role == 'admin')
    @include('pages.admin.admin-dashboard')
@endif
@endsection
