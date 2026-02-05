document.addEventListener('DOMContentLoaded', () => {
    // Only run on about page
    const carouselContainer = document.querySelector('.about-carousel');
    if (!carouselContainer) return;

    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');
    const modal = document.getElementById('about-modal');
    const closeModal = document.querySelector('.close-modal');
    const modalBody = document.getElementById('modal-body-content');
    const learnMoreBtns = document.querySelectorAll('.btn-learn-more');
    
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 6000; // 6 seconds

    // Content for Modals (Placeholder for now)
    const modalContent = {
        'modal-history': {
            title: 'Our Sacred History',
            text: 'The AnkammaThalli Temple traces its origins back centuries, rooted in the deep spiritual traditions of the region. Originally a humble shrine, it has grown through the devotion of patrons who witnessed the divine grace of the Goddess. Historical records and local folklore speak of miracles and the protective aura of the temple that has guarded the village through times of difficulty.'
        },
        'modal-mission': {
            title: 'Our Mission',
            text: 'Our mission is to create a sanctuary where every soul can find peace, purpose, and connection to the divine. We strive to preserve ancient Vedic traditions while fostering a welcoming community for modern devotees. Through daily rituals, annadanam (food donation), and spiritual education, we aim to uplift society.'
        },
        'modal-values': {
            title: 'Our Core Values',
            text: '<strong>Dharma (Righteousness):</strong> Upholding truth and moral order in all operations.<br><strong>Seva (Service):</strong> Believing that service to humanity is service to God.<br><strong>Purity:</strong> Maintaining the sanctity of the temple premises and our own hearts.<br><strong>Inclusivity:</strong> Welcoming devotees from all walks of life.'
        }
    };

    // --- Carousel Functions ---
    const showSlide = (index) => {
        // Reset Logic
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(ind => ind.classList.remove('active'));

        // Activate new
        currentSlide = (index + slides.length) % slides.length; // Wrap around
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    };

    const nextSlide = () => {
        showSlide(currentSlide + 1);
    };

    // Start Auto Cycle
    const startAutoSlide = () => {
        slideInterval = setInterval(nextSlide, intervalTime);
    };

    const stopAutoSlide = () => {
        clearInterval(slideInterval);
    };

    // Event Listeners for Indicators
    indicators.forEach((ind, index) => {
        ind.addEventListener('click', () => {
            stopAutoSlide(); // Pause on interaction
            showSlide(index);
            startAutoSlide(); // Restart
        });
    });

    // Initialize
    startAutoSlide();

    // --- Modal Functions ---
    learnMoreBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            stopAutoSlide(); // Stop slider while reading
            const key = btn.getAttribute('data-modal');
            const content = modalContent[key];
            
            if (content) {
                modalBody.innerHTML = `<h2>${content.title}</h2><p>${content.text}</p>`;
                modal.style.display = 'flex';
            }
        });
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        startAutoSlide(); // Resume slider
    });

    // Close on outside click
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            startAutoSlide();
        }
    });
});
