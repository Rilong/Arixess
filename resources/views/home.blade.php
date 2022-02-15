@extends('layouts.app')

@section('content')
    @auth()
        @manager()
            manager
        @else
            @include('contact')
        @endmanager
    @else
        unauthenticated
    @endauth
@endsection
