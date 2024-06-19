@extends('layouts.dashboard')
<style>
    #admin-header {
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    #admin-header.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@section('content')
    <section id='admin-header'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1 class="text-center display-4 py-4">Welcome {{ Auth::user()->name }}</h1>
                        <p class="lead">Glad to see you today</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Fungsi untuk menambahkan kelas 'show' ketika elemen masuk ke dalam pandangan
        function animateSectionOnScroll(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('show');
                    }, 500);
                    observer.unobserve(entry.target);
                }
            });
        }

        // Inisialisasi Intersection Observer
        const observer = new IntersectionObserver(animateSectionOnScroll, { rootMargin: '0px', threshold: 0.1 });

        // Amati elemen section dengan id 'header'
        const headerSection = document.querySelector('#admin-header');
        observer.observe(headerSection);
    });
</script>
