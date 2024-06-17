<style>
    #features {
        position: relative;
    }

    .background-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #343a40; /* Dark background color */
        z-index: -1;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s, transform 1s;
    }

    .background-overlay.show {
        opacity: 1;
        transform: translateY(0);
    }

    #features h2, #featureCards .col-md-4 {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s, transform 0.5s;
    }

    #features h2.show, #featureCards .col-md-4.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<section id="features" class="text-center bg-dark">
    <div class="container">
        <div class="background-overlay"></div>
        <h2 class="display-5 text-white">Features</h2>
        {{-- <p class="lead text-muted">Discover the powerful features that make managing your workforce a breeze.</p> --}}
        <div class="row pt-5 text-dark" id="featureCards">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm p-4">
                    <div class="card-body p-3">
                        <img src="{{ asset('img/settings.svg') }}" alt="settings" style="width: 50px; height: auto;" class="pb-3">
                        <h5 class="card-title p-lg-3">Enhancing Operational Efficiency</h5>
                        <p class="card-text d-none d-lg-block">Better time management allows for more accurate project planning and task distribution, reducing workforce overages or shortages at specific times.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm p-3">
                    <div class="card-body">
                        <img src="{{ asset('img/users.svg') }}" alt="users" style="width: 50px; height: auto;" class="pb-3">
                        <h5 class="card-title p-lg-3">Increasing Employee Engagement</h5>
                        <p class="card-text d-none d-lg-block">Providing consistent and transparent feedback helps employees recognize their achievements and motivates them to strive for more.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm p-3">
                    <div class="card-body">
                        <img src="{{ asset('img/shield.svg') }}" alt="shield" style="width: 50px; height: auto;" class="pb-3">
                        <h5 class="card-title p-lg-3">Strengthening Compliance and Risk Management</h5>
                        <p class="card-text d-none d-lg-block">Accurate documentation and easy reporting also aid in mitigating risks associated with absenteeism or non-compliance with established work schedules.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Function to animate elements one by one when they come into view
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

        // Initialize Intersection Observer
        const observer = new IntersectionObserver(animateElementsOnScroll, { rootMargin: '0px', threshold: 0.2 });

        // Select the elements to be observed
        const featureBg = document.querySelector('.background-overlay');
        const featureTitle = document.querySelector('#features h2');
        const featureCards = document.querySelectorAll('#featureCards .col-md-4');

        // Observe the background first
        observer.observe(featureBg);
        // Observe the title and cards with a delay
        setTimeout(() => {
            observer.observe(featureTitle);
            featureCards.forEach(card => {
                observer.observe(card);
            });
        }, 500); // Adjust the delay as needed
    });
</script>


