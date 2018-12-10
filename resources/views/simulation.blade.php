@extends('layouts.app')

@section('page-title','Simulasi')

@section('content')
    <simulation :loanoptions='{{$loanoptions}}'>
@endsection