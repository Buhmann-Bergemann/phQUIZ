import {addNotification} from "./notifier.js";

const x = document; // document variable
function qs(DOMSelector) {
    return document.querySelector(DOMSelector);
} // query selector

const homescreen = qs(".homescreen")
const userselect = qs(".user-select")
const usernameInput = qs("#user_input")
const usernameSubmit = qs("#user_entry_join")
const usernameForm = qs("#user_entry_form")

homescreen.style.display = "none";
userselect.style.display = "block";

usernameForm.addEventListener("submit", (e) => {
    e.preventDefault();

    if (usernameInput.value.length === 0 || usernameInput.value.length <= 3 || usernameInput.value.length >= 12) {
        addNotification("USERNAME INVALID", "The prompted username is invalid", true);
        console.log("ERROR");
    }
})

