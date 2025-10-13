import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let count = 0;

        const duration = 5000; 
        const fps = 60; // frame per detik
        const totalFrames = Math.round((duration / 1000) * fps);
        const step = target / totalFrames;

        const update = () => {
            count += step;
            if (count > target) count = target;
            counter.textContent = Math.floor(count);
            if (count < target) requestAnimationFrame(update);
        };

        update();
    });


    // Animated subtext - GSAP "typewriter" style
const textEl = document.querySelector("#subtext");
if (textEl) {
    const text = "Kembangkan kemampuanmu, raih prestasi, dan jadilah generasi unggul siap menghadapi tantangan masa depan.";
    textEl.textContent = "";

    text.split("").forEach(char => {
        const span = document.createElement("span");
        span.textContent = char;
        textEl.appendChild(span);
    });

    gsap.from("#subtext span", {
        opacity: 0,
        y: 5,
        stagger: 0.06,
        duration: 0.4,
        ease: "power2.out"
    });
}
});
