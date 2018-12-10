@extends('layouts.app')

@section('page-title','Welcome')

@section('content')
<b-container>
    <b-row align-v='center'>
        <b-jumbotron fluid text-variant="light">
            <template slot="header">
                Simulasi Kredit XYZ
            </template>
            <template slot="lead">
                This is a simple hero unit, a simple jumbotron-style component for
                calling extra attention to featured content or information.
            </template>
            <b-btn href="#">Mulai Simulasi Kredit</b-btn>
        </b-jumbotron>
    </b-row>
</b-container>    
@endsection
