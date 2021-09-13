const menuNavbarItemExpand = document.querySelector("#menuNavbarItemExpand")
const subMenuItems = document.querySelector("#subMenuItems")

menuNavbarItemExpand.addEventListener("click", ()=>{
    subMenuItems.classList.toggle("w3-hide")
})