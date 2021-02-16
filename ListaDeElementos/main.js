"use: strict";
document.addEventListener("DOMContentLoaded", iniciar);
function iniciar() {
    let links = document.querySelectorAll(".limite");
    for(let i = 0; i < links.length; i++){
        links[i].addEventListener("click", getList);
    }

    function getList(event) {
        event.preventDefault();
        let url = event.target.href;
        fetch(url, {
            "method": "GET"
        })
        .then(response => response.text())
        .then(html => {
            let contenedor = document.querySelector(".content");
            contenedor.innerHTML = html;
        })
        .catch(console.error());
    }
}