export function addNotification(heading, subtext, isWarning) {
    const notification = document.createElement("div")
    const headingText = document.createTextNode(heading);
    const subText = document.createTextNode(subtext);
    notification.appendChild(headingText);
    notification.appendChild(document.createElement("br"));
    notification.appendChild(document.createElement("br"));
    notification.appendChild(subText);
    if(!isWarning)
    {
        notification.classList.add("notification");
    }
    else {
        notification.classList.add("notification");
        notification.classList.add("notification-warning");
    }
    const body = document.body;
    body.appendChild(notification);
    sleep(3000).then(() => {
        notification.style.opacity = "0";
        sleep(2000).then(() => {
            notification.remove();
        });
    });
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}