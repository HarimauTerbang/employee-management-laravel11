<style>
    #contact h2,
    #contact p.lead,
    #contact form,
    #contact .footer-links,
    #contact p.text-secondary {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s, transform 0.5s;
    }

    #contact h2.show,
    #contact p.lead.show,
    #contact form.show,
    #contact .footer-links.show,
    #contact p.text-secondary.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<section id="contact" class="text-center bg-dark text-white">
    <div class="container">
        <h2 class="display-5">Contact Us</h2>
        <p class="lead text-muted">Get in touch with us for more information.</p>
        <form id="contactForm" method="post" action="">
            @csrf
            <div class="mb-3">
                <label for="contactEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="your active email" required>
            </div>
            <div class="mb-3">
                <label for="contactMessage" class="form-label">Message</label>
                <textarea class="form-control" id="contactMessage" name="contactMessage" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="container text-center">
            <div class="footer-links mb-3 mt-5">
                <a href="https://github.com/HarimauTerbang" class="text-white text-decoration-none"><i data-feather="github"></i><b>HarimauTerbang</b></a>
                <p class="text-secondary">&copy; 2024 Employee Management System. All rights reserved.</p>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        function animateElementsOnScroll(entries, observer) {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('show');
                    }, index * 500);
                    observer.unobserve(entry.target);
                }
            });
        }

        const observer = new IntersectionObserver(animateElementsOnScroll, { rootMargin: '0px', threshold: 0.2 });
        const contactElements = document.querySelectorAll('#contact h2, #contact p.lead, #contact form, #contact .footer-links, #contact p.text-secondary');

        contactElements.forEach((element, index) => {
            observer.observe(element);
        });
    });
</script>
