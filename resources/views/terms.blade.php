@extends('layouts.app')

@section('title', 'Términos y Condiciones | Sabores en Casa')

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <div class="ul-breadcrumb">
        <div class="wow animate__fadeInUp">
            <h2 class="ul-breadcrumb-title">Términos y Condiciones</h2>
            <div class="ul-breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <span class="separator">/</span>
                <span class="current-page">Términos y Condiciones</span>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB SECTION END -->

    @include('partials.aviso-legal')
@endsection
