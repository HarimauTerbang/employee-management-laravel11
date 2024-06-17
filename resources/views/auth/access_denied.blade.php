@extends('layouts.alert')

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

    #access-denied {
        animation: fadeInUp 0.5s ease forwards;
    }
</style>
<section id="access-denied">
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{ asset('img/alert-circle.svg') }}" alt="Alert Icon" class="img-fluid mb-3" style="width: 100px; height: auto;">
        </div>
        <div class="row justify-content-center">
            <div class="text-center">
                <h1>Warning : Access Denied</h1>
                <p>You do not have permission to access this page.</p>
                <button class="btn btn-secondary px-3" onclick="window.history.back()">Back</button>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#access-denied').addClass('animated');
    });
</script>
@endsection
