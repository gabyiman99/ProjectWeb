@extends('layouts.app')

@section('page-title','Tentang Kami')

@section('content')
<b-container>
    <b-row align-v='center'>
        <b-jumbotron fluid text-variant="light">
            <template slot="header">
                Tentang Kami
            </template>
            <template slot="lead">
                Kami membuat aplikasi ini untuk tugas kampus. Saat ini aplikasi ini dalam tahap pengembangan.
            </template>
        </b-jumbotron>
    </b-row>
</b-container> 
@endsection