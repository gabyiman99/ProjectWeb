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
                Aplikasi berbasis web untuk aplikasi kredit, saat ini dalam tahap pengembangan.
            </template>
            <b-btn href="{{ url('simulation') }}">Mulai Simulasi Kredit</b-btn>
        </b-jumbotron>
    </b-row>
</b-container>    
@endsection
