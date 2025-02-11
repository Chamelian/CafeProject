var imageDivs = document.getElementsByClassName("menuHeader");

for (let i = 0; i < imageDivs.length; i++) {
    var img = imageDivs[i].children[0];
    img.addEventListener("click", (ev) => {
        var page = ev.target.classList[0];
        window.location.href = `../php/${page}.php`;
    });
}