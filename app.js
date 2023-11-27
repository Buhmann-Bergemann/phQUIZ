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


// DOM Elements
const homescreen = qs(".homescreen");
const userselect = qs(".user-select");
const usernameInput = qs("#user_input");
const usernameSubmit = qs("#user_entry_join");
const usernameForm = qs("#user_entry_form");
const clickableElements = qsa(".clickable");
const menuItems = qsa(".menu-item")
// Others
const clickSfx = new Audio('media/sfx/click.wav')
const backSfx = new Audio('media/sfx/rollover.wav')

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

