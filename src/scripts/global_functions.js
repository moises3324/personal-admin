const navbarToggler = document.querySelector(".navbar-toggler")
const menuNavbar = document.querySelector("#menuNavbar")

navbarToggler.addEventListener("click", ()=>{
    menuNavbar.classList.toggle("d-none")
    menuNavbar.classList.toggle("d-block")
})