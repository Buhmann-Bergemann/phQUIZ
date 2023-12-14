// Existing code in jukebox.js
let volume = 0.02;
const jukeboxDiv = document.querySelector(".jukebox")
const musicSelection =
    [
        ['On Our Way - Square Enix', new Audio('media/sfx/bgm1.mp3')]
    ]

function playSound(sound){
    sound.volume = volume;
    sound.play();
}

setInterval(() => {
    if (document.querySelector(".homescreen").style.display == "block")
    {
        playSound(musicSelection[0][1]);
    }
}, "2500");

// New code to add
function setVolume(newVolume) {
    volume = newVolume;
    musicSelection.forEach(([name, audio]) => {
        audio.volume = volume;
    });
}

// Save volume when it is changed
function saveVolume() {
    localStorage.setItem('volume', volume);
}

// Load volume when the page is loaded
function loadVolume() {
    const savedVolume = localStorage.getItem('volume');

    if (savedVolume !== null) {
        volume = parseFloat(savedVolume);
        setVolume(volume);
    }
}

// Call loadVolume when the page is loaded
document.addEventListener('DOMContentLoaded', loadVolume);