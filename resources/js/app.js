require("./bootstrap");


const hamburgerIcon = document.querySelector("#menu-bar");
const sidebar = document.querySelector(".sidebar");
const container = document.querySelector(".custom-container");

const errors = document.querySelectorAll(".error");
const success = document.querySelector(".success");

hamburgerIcon.addEventListener("click", (e) => {
    e.currentTarget.classList.toggle("change");
    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        document.body.style.overflowY = "auto";
    } else {
        sidebar.classList.add("open");
        document.body.style.overflowY = "hidden";
    }
});

container.addEventListener("click", () => {
    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        hamburgerIcon.classList.toggle("change");
    }
});

if (errors && errors.length > 0) {
    errors.forEach((error) => {
        const closeBtn = error.children[0];
        closeBtn.addEventListener("click", () => {
            error.style.display = "none";
        });
    });
}

if (success) {
    setTimeout(() => {
        success.style.animationName = "disappear";
    }, 2000);
}
