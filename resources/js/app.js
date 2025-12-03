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

// Function to handle Instagram sharing
function shareOnInstagram(url, title) {
    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        }).catch(console.error);
    } else {
        // Fallback: copy link to clipboard
        navigator.clipboard.writeText(url).then(() => {
            alert('Link berhasil disalin ke clipboard! Bagikan melalui Instagram secara manual.');
        }).catch(() => {
            alert('Gagal menyalin link. Silakan salin secara manual: ' + url);
        });
    }
}
