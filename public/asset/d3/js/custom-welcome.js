document.addEventListener("DOMContentLoaded", function() {
    const typewriter = document.querySelector('.typewriter');
    const welcomeBox = document.querySelector('.welcome-box');
    const screamSound = document.getElementById('screamSound');
    const text = typewriter ? typewriter.getAttribute('data-text') : '';
    let i = 0;
    let soundPlaying = false;
    let soundStarted = false;
    let typewriterDone = false;
    let soundDone = false;

    // Helper untuk animasi fadeout sebelum remove
    function fadeOutAndRemove(el) {
        if (!el) return;
        el.classList.add('fadeout');
        // Stop sound jika box mulai hilang
        if (screamSound && !screamSound.paused) {
            screamSound.pause();
            screamSound.currentTime = 0;
            soundPlaying = false;
        }
        setTimeout(() => {
            if (el.parentNode) el.parentNode.removeChild(el);
        }, 400); // waktu fadeout dipercepat
    }

    // Observer untuk deteksi jika box dihapus manual
    const observer = new MutationObserver(() => {
        if (!document.body.contains(welcomeBox) && soundPlaying) {
            if (screamSound && !screamSound.paused) {
                screamSound.pause();
                screamSound.currentTime = 0;
            }
            soundPlaying = false;
            soundDone = true;
        }
    });
    observer.observe(document.body, { childList: true, subtree: true });

    function checkAndRemoveBox() {
        if (typewriterDone && soundDone) {
            fadeOutAndRemove(welcomeBox);
        }
    }

    function tryPlaySound() {
        if (!soundStarted && screamSound && welcomeBox) {
            screamSound.volume = 1;
            screamSound.play().then(() => {
                soundPlaying = true;
            }).catch(e => {
                // Jika autoplay gagal, tunggu interaksi user
                document.addEventListener('click', userPlayHandler, { once: true });
                document.addEventListener('touchstart', userPlayHandler, { once: true });
            });
            soundStarted = true;
            // Hapus welcome box setelah sound selesai
            screamSound.onended = function() {
                soundPlaying = false;
                soundDone = true;
                checkAndRemoveBox();
            };
        }
    }

    function userPlayHandler() {
        if (!soundPlaying && screamSound && welcomeBox) {
            screamSound.play().then(() => {
                soundPlaying = true;
            });
        }
    }

    function type() {
        tryPlaySound();
        if (typewriter && i < text.length) {
            typewriter.textContent = text.substring(0, i + 1);
            i++;
            setTimeout(type, 25); // kecepatan typing dipercepat
        } else {
            typewriterDone = true;
            checkAndRemoveBox();
        }
    }

    // Set src audio sesuai level user
    if (welcomeBox && screamSound) {
        const level = welcomeBox.getAttribute('data-level');
        let soundSrc = '';
        if (level === 'admin') {
            soundSrc = '/asset/d3/sounds/omg.mp3';
        } else if (level === 'user') {
            soundSrc = '/asset/d3/sounds/dumb.mp3';
        } else {
            soundSrc = '/asset/d3/sounds/dumb.mp3'; // fallback
        }
        screamSound.src = soundSrc;
    }

    type();
});
