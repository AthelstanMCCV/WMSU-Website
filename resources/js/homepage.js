document.addEventListener("DOMContentLoaded", function () {
    let video = document.getElementById("delayedVideo");
    let container = document.querySelector(".homepage-video-container");

    setTimeout(() => {
        video.play();
        video.classList.add("playing"); // Make video visible
        container.classList.add("video-playing"); // Remove gradient
    }, 1000);
});

document.addEventListener("DOMContentLoaded", function () {
    const cardImageGroups = document.querySelectorAll('.swiper-slide .relative');

    cardImageGroups.forEach(group => {
        const images = group.querySelectorAll('.image-fader');
        let currentIndex = 0;

        // Remove no-transition from first image instantly on load
        requestAnimationFrame(() => {
            images[0].classList.remove('no-transition');
        });

        // Only cycle if multiple images exist
        if (images.length > 1) {
            setInterval(() => {
                images[currentIndex].classList.remove('opacity-100');
                images[currentIndex].classList.add('opacity-0');

                currentIndex = (currentIndex + 1) % images.length;

                images[currentIndex].classList.remove('opacity-0');
                images[currentIndex].classList.add('opacity-100');
            }, 3000);
        }
    });
});
