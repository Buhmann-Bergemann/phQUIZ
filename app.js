import {addNotification} from "./notifier.js";

// Global Variables
let volume = 1.0;

// DOM Elements
const homescreen = document.querySelector(".homescreen");
const userselect = document.querySelector(".user-select");
const joinAsGuestButton = document.querySelector('#join_as_guest');
const usernameInput = document.querySelector("#user_input");
const usernameSubmit = document.querySelector("#user_entry_join");
const usernameForm = document.querySelector("#user_entry_form");
const clickableElements = document.querySelectorAll(".clickable");
const menuItems = document.querySelectorAll(".menu-item");
const configMenuItem = document.querySelector(".config");
const configMenu = document.querySelector(".config-menu");
const configMenuSave = document.querySelector(".config-menu > .btn");
const playMenuItem = document.querySelector(".play");
const githubItem = document.querySelector(".github");
const playMenu = document.querySelector(".play-menu")

// Sound Effects
const clickSfx = new Audio('media/sfx/click.wav')
const backSfx = new Audio('media/sfx/rollover.wav')

// Opened Menus
let configMenuIsOpen = false;
let playMenuIsOpen = false;

// Hide homescreen and show user select screen
homescreen.style.display = "none";
userselect.style.display = "block";

// Add click sound effect to clickable elements
clickableElements.forEach((el) => {
    el.addEventListener("mousedown", () => {
        playSound(el.classList.contains("back") ? backSfx : clickSfx);
    })
})

// Add hover sound effect to menu items
menuItems.forEach((el) => {
    el.addEventListener("mouseenter", () => {
        playSound(backSfx)
    })
})

// Validate username on form submit
usernameForm.addEventListener("submit", (e) => {
    e.preventDefault();
    if (usernameInput.value.length === 0 || usernameInput.value.length <= 3 || usernameInput.value.length >= 12) {
        addNotification("USERNAME INVALID", "The prompted username is invalid", true);
    } else {
        usernameForm.submit();
    }
})

// Open GitHub page on GitHub item click
githubItem.addEventListener("mousedown", () => {
    window.open("https://github.com/Buhmann-Bergemann/ifwb-projekt-php-quiz-1-mit-sternchen-team", "_blank");
});

// Toggle play menu on play menu item click
playMenuItem.addEventListener("mousedown", () => {
    toggleMenu(playMenu, playMenuIsOpen);
    playMenuIsOpen = !playMenuIsOpen;
    if (configMenuIsOpen) {
        toggleMenu(configMenu, configMenuIsOpen);
        configMenuIsOpen = false;
    }
})

// Toggle config menu on config menu item click
configMenuItem.addEventListener("mousedown", () => {
    toggleMenu(configMenu, configMenuIsOpen);
    configMenuIsOpen = !configMenuIsOpen;
    if (playMenuIsOpen) {
        toggleMenu(playMenu, playMenuIsOpen);
        playMenuIsOpen = false;
    }
})

// Submit form as guest on join as guest button click
joinAsGuestButton.addEventListener('click', function(event) {
    event.preventDefault();
    usernameInput.value = 'guest';
    usernameForm.submit();
});

// Save config on config menu save button click
configMenuSave.addEventListener("mousedown", () => {
    // Save config here
})

// Functions
function playSound(sound){
    sound.volume = volume;
    sound.play();
}

function toggleMenu(menu, isOpen) {
    menu.style.display = isOpen ? "none" : "block";
}