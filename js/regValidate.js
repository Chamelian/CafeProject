document.getElementsByName("password")[0].addEventListener("input", (ev) => {
    if (ev.target.value.length < 8 || !RegExp(/[!@#$%^&*()\-=_+\[\]{}\\|;:'\",<.>/?]/g).test(ev.target.value) || !RegExp(/[0-9]/g).test(ev.target.value)) {
        ev.target.setCustomValidity("The password must have at least 8 characters including a special character and a number.");
    } else {
        ev.target.setCustomValidity("");
    }
});