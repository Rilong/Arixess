@extends('layouts.app')

@section('content')
    @auth()
        @manager()
            @include('messages')
        @else
            @include('contact')
        @endmanager
    @else
        unauthenticated
    @endauth
@endsection
