<section id="about" class="text-center" >
    <div class="container">
        <h2 class="display-5">About Us</h2>
        <p class="lead text-muted">Learn more about our mission and values.</p>
        <p>Our website is dedicated to providing the best solutions for employee management.</p>
    </div>
</section>
<style>
    #about {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

#about.show {
    opacity: 1;
    transform: translateY(0);
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Fungsi untuk menambahkan kelas 'show' ketika elemen masuk ke dalam pandangan
    function animateSectionOnScroll(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('show');
                }, 500); // Menambahkan penundaan 1 detik (1000 milidetik)
                observer.unobserve(entry.target);
            }
        });
    }

    // Inisialisasi Intersection Observer
    const observer = new IntersectionObserver(animateSectionOnScroll, { rootMargin: '0px', threshold: 0.1 });

    // Amati elemen section dengan id 'header' dan 'about'
    const headerSection = document.querySelector('#header');
    const aboutSection = document.querySelector('#about');

    observer.observe(headerSection);
    observer.observe(aboutSection);
});

</script>
