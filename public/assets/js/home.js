document.addEventListener('DOMContentLoaded', () => {
    // Only run on home page slider
    const homeCarousel = document.querySelector('.home-carousel');
    if (!homeCarousel) return;

    const slides = document.querySelectorAll('.home-slide');
    
    const nextBtn = document.querySelector('.home-nav-arrow.next');
    const prevBtn = document.querySelector('.home-nav-arrow.prev');

    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 6000; // 6 seconds

    // Initial Setup
    slides[0].classList.add('active');

    const showSlide = (newIndex, direction) => {
        // Handle Wrap-around internally or assume passed index is valid?
        // Let's validate here
        let index = newIndex;
        if (index >= slides.length) index = 0;
        if (index < 0) index = slides.length - 1;

        if (index === currentSlide) return;

        const oldSlide = slides[currentSlide]; // Current is now old
        const newSlide = slides[index];

        // Set global direction for CSS context
        homeCarousel.setAttribute('data-direction', direction);

        // Reset classes for all (clean slate) - mostly to remove 'exit' from others
        slides.forEach(s => {
            s.classList.remove('active', 'exit');
            // Force reflow to restart animations if needed? 
            // Usually removing/adding class in same frame needs reflow.
            // But here we are switching slides.
        });

        // Configure Animation classes
        oldSlide.classList.add('exit'); // This one leaves
        newSlide.classList.add('active'); // This one enters

        currentSlide = index;
    };

    const nextSlide = () => {
        showSlide(currentSlide + 1, 'next');
    };

    const prevSlide = () => {
        showSlide(currentSlide - 1, 'prev');
    };

    const startAutoSlide = () => {
        slideInterval = setInterval(nextSlide, intervalTime);
    };

    const stopAutoSlide = () => {
        clearInterval(slideInterval);
    };

    // Event Listeners for Arrows
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });
    }

    // Initialize
    startAutoSlide();
});
