const menuNavbarItemExpand1 = document.querySelector("#menuNavbarItemExpand1")
const subMenuItems = document.querySelector("#subMenuItems")
const arrow1 = document.querySelector("#arrow1")

menuNavbarItemExpand1.addEventListener("click", () => {
    subMenuItems.classList.toggle("w3-hide")
    arrow1.classList.toggle("rotate180")
})