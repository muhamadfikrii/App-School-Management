import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    // Counter
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        let target = +counter.getAttribute('data-target');
        let count = 0;
        let step = Math.ceil(target / 200);
        const update = () => {
            count += step;
            if (count > target) count = target;
            counter.textContent = count;
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
