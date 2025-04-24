document.addEventListener("DOMContentLoaded", function () {
    let video = document.getElementById("delayedVideo");
    let container = document.querySelector(".homepage-video-container");

    setTimeout(() => {
        video.play();
        video.classList.add("playing"); // Make video visible
        container.classList.add("video-playing"); // Remove gradient
    }, 1000);
});

document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('newsCarousel');
    const dots = document.querySelectorAll('[data-index]');
    let currentIndex = 0;
    let startX = 0;
    let isDragging = false;

    // Touch events
    carousel.addEventListener('touchstart', handleTouchStart, { passive: true });
    carousel.addEventListener('touchmove', handleTouchMove, { passive: true });
    carousel.addEventListener('touchend', handleTouchEnd, { passive: true });

    function handleTouchStart(e) {
        startX = e.touches[0].clientX;
        isDragging = true;
    }

    function handleTouchMove(e) {
        if (!isDragging) return;
        
        const currentX = e.touches[0].clientX;
        const diff = startX - currentX;
        const moveX = (currentIndex * -100) - (diff / carousel.offsetWidth * 100);
        
        // Limit the drag to the next/previous slide only
        if (moveX <= 0 && moveX >= -300) {
            carousel.style.transform = `translateX(${moveX}%)`;
            carousel.style.transition = 'none';
        }
    }

    function handleTouchEnd(e) {
        if (!isDragging) return;
        
        isDragging = false;
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        const threshold = carousel.offsetWidth * 0.2; // 20% of carousel width

        carousel.style.transition = 'transform 0.3s ease-out';

        if (Math.abs(diff) > threshold) {
            if (diff > 0 && currentIndex < 3) {
                // Swipe left
                currentIndex++;
            } else if (diff < 0 && currentIndex > 0) {
                // Swipe right
                currentIndex--;
            }
        }

        updateCarousel();
    }

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        carousel.style.transition = 'transform 0.3s ease-out';

        // Update dots
        dots.forEach((dot, index) => {
            dot.style.opacity = index === currentIndex ? '1' : '0.5';
        });

        // Show text for current slide
        const slides = carousel.querySelectorAll('.group');
        slides.forEach((slide, index) => {
            if (index === currentIndex) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });
    }

    // Handle dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });

    // Add CSS for active state
    const style = document.createElement('style');
    style.textContent = `
        .group.active .absolute.bottom-0 {
            transform: translateY(0);
        }
        .group .absolute.bottom-0 {
            transform: translateY(100%);
            transition: transform 0.3s ease-out;
        }
        #newsCarousel {
            touch-action: pan-x pinch-zoom;
        }
    `;
    document.head.appendChild(style);
});