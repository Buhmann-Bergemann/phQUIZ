import {addNotification} from "./notifier.js";

// Global Variables
let volume = 1.0;
const x = document; // document variable

function playSound(sound){
    sound.volume = volume;
    sound.play();
}
function qs(DOMSelector) {
    return document.querySelector(DOMSelector);
} // query selector
function qsa(DOMSelector){
    return document.querySelectorAll(DOMSelector)
}

function loadTsParticles() {
    tsParticles
        .loadJSON("tsparticles", "assets/particles.json")
        .then(container => {
            console.log("callback - tsparticles config loaded");
        })
        .catch(error => {
            console.error(error);
        });
}

setTimeout(loadTsParticles, "2100");

// DOM Elements
const homescreen = qs(".homescreen");
const userselect = qs(".user-select");
const usernameInput = qs("#user_input");
const usernameSubmit = qs("#user_entry_join");
const usernameForm = qs("#user_entry_form");
const clickableElements = qsa(".clickable");
const menuItems = qsa(".menu-item")
const configMenuItem = qs(".config")
const configMenu = qs(".config-menu")
const configMenuSave = qs(".config-menu > .btn")

// Others
const clickSfx = new Audio('media/sfx/click.wav')
const backSfx = new Audio('media/sfx/rollover.wav')

// Opened Menus
let configMenuIsOpen = false;

homescreen.style.display = "none";
userselect.style.display = "block";

//for(let i = 0; i < clickableElements.length; i++) {
clickableElements.forEach((el) => {
    el.addEventListener("mousedown", () => {
        if (el.classList.contains("back")){
            playSound(backSfx)
        }
        else {
            playSound(clickSfx);
        }
    })
})

menuItems.forEach((el) => {
    el.addEventListener("mouseenter", () => {
        playSound(backSfx)
    })
})


usernameForm.addEventListener("submit", (e) => {
    e.preventDefault();
    if (usernameInput.value.length === 0 || usernameInput.value.length <= 3 || usernameInput.value.length >= 12) {
        addNotification("USERNAME INVALID", "The prompted username is invalid", true);
        console.log("ERROR");
    } else {
        usernameForm.submit();
    }
})

configMenuItem.addEventListener("mousedown", () => {
    if(!configMenuIsOpen)
    {
        configMenu.style.display = "block";
        configMenuIsOpen = true;
    }
    else {
        configMenu.style.display = "none";
        configMenuIsOpen = false;
    }
})

configMenuSave.addEventListener("mousedown", () => {

})

