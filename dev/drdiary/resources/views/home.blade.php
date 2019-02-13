@extends('layouts.app')

@section('title')
    Doctor Diary - Home
@endsection

@section('content')
    @doctor
    @include('user.doctor.dashboard')
    @enddoctor

    @assistant
    @include('user.assistant.dashboard')
    @endassistant

@endsection
