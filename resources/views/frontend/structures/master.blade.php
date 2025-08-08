@extends('frontend.structures.layout')
@section('master_content')
    @include('frontend.structures.header')

    @yield('content')

    @include('frontend.structures.footer')

@endsection
