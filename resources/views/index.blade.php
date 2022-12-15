@extends('statamic::layout')
@section('title', 'Opening hours')

@section('content')

    <publish-form
            title="@lang('statamic-opening-hours::opening-hours.opening-hours')"
            action="{{ cp_route('opening-hours.store') }}"
            :blueprint='@json($blueprint)'
            :meta='@json($meta)'
            :values='@json($values)'
    ></publish-form>

@endsection
