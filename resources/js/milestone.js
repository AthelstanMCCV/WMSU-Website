document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.3
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const container = entry.target;
                container.classList.add('in-view');
                
                // Add in-view class to child elements
                const image = container.querySelector('.milestone-image');
                const content = container.querySelector('.milestone-content');
                
                if (image) image.classList.add('in-view');
                if (content) content.classList.add('in-view');
            }
        });
    }, observerOptions);

    // Observe all milestone containers
    const milestoneContainers = document.querySelectorAll('.new-milestone-container');
    milestoneContainers.forEach(container => {
        observer.observe(container);
    });
}); 