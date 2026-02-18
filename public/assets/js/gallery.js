/**
 * Ankammathalli Gallery - 3D Layered Carousel
 */

document.addEventListener('DOMContentLoaded', () => {
    initGallery();
});

function initGallery() {
    const state = {
        images: [], // All image data
        filteredImages: [], // Currently visible images
        activeIndex: 0,
        currentCategory: 'all'
    };

    // DOM Elements
    const carouselContainer = document.querySelector('.carousel-3d-container');
    const chipList = document.querySelector('.category-chips-list');
    const chips = document.querySelectorAll('.category-chip'); // Select all directly
    
    // Load Initial Data
    const items = document.querySelectorAll('.carousel-item');
    state.images = Array.from(items).map((item, index) => ({
        element: item,
        category: item.getAttribute('data-category').toLowerCase(),
        fullSrc: item.getAttribute('data-full-src'),
        title: item.querySelector('h3').textContent,
        originalIndex: index
    }));

    // --- 1. Category Chips Logic ---
    // Always show all chips
    chips.forEach(chip => {
        chip.style.display = 'inline-block';
        
        chip.addEventListener('click', () => {
            chips.forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
            
            const cat = chip.getAttribute('data-category');
            filterImages(cat);
        });
    });

    // --- 2. Filter & Carousel Logic ---

    const filterImages = (category) => {
        state.currentCategory = category;
        
        // Filter
        if (category === 'all') {
            state.filteredImages = [...state.images];
        } else {
            state.filteredImages = state.images.filter(img => img.category === category.toLowerCase());
        }

        // Reset Active Index to Center
        state.activeIndex = Math.floor(state.filteredImages.length / 2);
        if (state.filteredImages.length === 0) state.activeIndex = 0;

        renderCarousel();
    };

    const renderCarousel = () => {
        // Hide all items first
        state.images.forEach(img => {
            img.element.style.display = 'none';
            img.element.className = 'carousel-item'; // Reset classes
        });

        if (state.filteredImages.length === 0) return;

        // Ensure activeIndex is in bounds
        if (state.activeIndex >= state.filteredImages.length) state.activeIndex = state.filteredImages.length - 1;
        if (state.activeIndex < 0) state.activeIndex = 0;

        // Render Visible Items with Classes
        state.filteredImages.forEach((img, i) => {
            img.element.style.display = 'block';
            
            // Determine position relative to active
            const diff = i - state.activeIndex;
            
            if (diff === 0) {
                img.element.classList.add('active');
            } else if (diff === -1) {
                img.element.classList.add('prev');
            } else if (diff === 1) {
                img.element.classList.add('next');
            } else if (diff === -2) {
                img.element.classList.add('prev-2');
            } else if (diff === 2) {
                img.element.classList.add('next-2');
            } else {
                // Others are just transparent/hidden by CSS default? 
                // We should make sure they are behind or hidden
                // CSS defaults to opacity 0 if not active/prev/next
            }
            
            // Store index for click-to-activate
            img.element.onclick = () => {
                if (diff === 0) {
                    openModal(state.activeIndex);
                } else {
                    state.activeIndex = i;
                    renderCarousel();
                }
            };
        });
    };

    // Navigation Controls
    document.querySelector('.carousel-nav.prev').addEventListener('click', () => {
        if (state.activeIndex > 0) {
            state.activeIndex--;
            renderCarousel();
        }
    });

    document.querySelector('.carousel-nav.next').addEventListener('click', () => {
        if (state.activeIndex < state.filteredImages.length - 1) {
            state.activeIndex++;
            renderCarousel();
        }
    });

    // Swipe Support Removed as requested

    // Initialize (Load All)
    filterImages('all');


    // --- 3. Lightbox Modal ---
    const modal = document.getElementById('gallery-modal');
    const modalImg = document.getElementById('modal-image');
    const modalCaption = document.getElementById('modal-caption');
    const modalCounter = document.getElementById('modal-counter');
    const closeBtn = document.querySelector('.modal-close');
    const modalPrev = document.querySelector('.modal-nav.prev');
    const modalNext = document.querySelector('.modal-nav.next');

    function openModal(index) {
        updateModalContent(index);
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    function updateModalContent(index) {
        const imgData = state.filteredImages[index];
        if (!imgData) return;

        modalImg.style.opacity = 0; // Quick fade
        setTimeout(() => {
            modalImg.src = imgData.fullSrc;
            modalImg.style.opacity = 1;
        }, 100);

        modalCaption.textContent = imgData.title;
        modalCounter.textContent = `${index + 1} / ${state.filteredImages.length}`;

        // Boundary Checks
        if (index === 0) {
            modalPrev.classList.add('disabled');
        } else {
            modalPrev.classList.remove('disabled');
        }

        if (index === state.filteredImages.length - 1) {
            modalNext.classList.add('disabled');
        } else {
            modalNext.classList.remove('disabled');
        }
    }

    closeBtn.addEventListener('click', closeModal);
    document.querySelector('.modal-overlay').addEventListener('click', closeModal);

    modalPrev.addEventListener('click', () => {
        const currentIndex = state.filteredImages.findIndex(img => img.fullSrc === modalImg.getAttribute('src')); // Or track global
        // Actually better to just use activeIndex if we keep them synced, 
        // BUT user might scroll modal without scrolling background carousel?
        // Let's keep modal nav independent of background carousel
        // So we need to track `modalIndex`
        // Wait, best UX: Update background carousel too? 
        // Let's update `modalCurrentIndex` locally.
    });

    // Let's fix Modal Navigation
    let modalCurrentIndex = 0;

    // Override openModal to set index
    const _openModal = openModal;
    openModal = function(index) {
        modalCurrentIndex = index;
        _openModal(index);
    };

    modalPrev.addEventListener('click', (e) => {
        e.stopPropagation();
        if (modalCurrentIndex > 0) {
            modalCurrentIndex--;
            updateModalContent(modalCurrentIndex);
        }
    });

    modalNext.addEventListener('click', (e) => {
        e.stopPropagation();
        if (modalCurrentIndex < state.filteredImages.length - 1) {
            modalCurrentIndex++;
            updateModalContent(modalCurrentIndex);
        }
    });
    
    // Key Events
    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('active')) return;
        if (e.key === 'Escape') closeModal();
        if (e.key === 'ArrowLeft' && modalCurrentIndex > 0) {
            modalCurrentIndex--;
            updateModalContent(modalCurrentIndex);
        }
        if (e.key === 'ArrowRight' && modalCurrentIndex < state.filteredImages.length - 1) {
            modalCurrentIndex++;
            updateModalContent(modalCurrentIndex);
        }
    });
}
