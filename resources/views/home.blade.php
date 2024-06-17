@extends('layouts.main')

@section('content')
<style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        50% {
            opacity: 1;
            transform: scale(1) ;
        }
        80% {
            opacity: 1;
            transform: scale(0.85);
        }
        100% {
            opacity: 1;
            transform: scale(0.9);
        }
    }
    #home-header {
        animation: fadeInUp 0.5s ease forwards;
    }
</style>
    <section id="home-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h2>You are a User.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    $(document).ready(function() {
        $('#home-header').addClass('animated');
    });
</script>
@endsection
