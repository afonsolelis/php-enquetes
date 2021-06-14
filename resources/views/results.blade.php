@extends('layout')
@section('content')
    <results-component :poll="{{json_encode($poll)}}" :options="{{json_encode($options)}}"></results-component>
@endsection


