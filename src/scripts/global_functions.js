const menuNavbarItemExpand1 = document.querySelector("#menuNavbarItemExpand1")
const subMenuItems = document.querySelector("#subMenuItems")
const arrow1 = document.querySelector("#arrow1")
const totalRecords = document.querySelector("#totalRecords")
const responseAlert = document.querySelector("#responseAlert")

menuNavbarItemExpand1.addEventListener("click", () => {
    subMenuItems.classList.toggle("w3-hide")
    arrow1.classList.toggle("rotate180")
})

//Show the response alert
function showResponseAlert(props) {
    const message = `
         <div class="w3-panel w3-display-container w3-padding-8 ${props.css}">
             <div class="w3-center">
                <span class="material-icons">
                    ${props.icon}
                </span>
             </div>
             <div class="w3-center">
                ${props.text}
             </div>
         </div>
    `
    responseAlert.innerHTML = message
    responseAlert.style.display = 'block'
}

function hideResponseAlert() {
    responseAlert.style.display = 'none'
}

//Set the information to show in the response alert
function handleResponseAlert(data) {
    if (data.includes('correctamente')) {
        props.icon = "check_circle"
        props.text = data
        props.css = "w3-light-green w3-text-white"
    } else if (data.includes('Duplicate entry')) {
        props.icon = "error"
        props.text = "Error: registro ya existe. No se puede ingresar dos veces"
        props.css = "w3-red w3-text-white"
    } else {
        props.icon = "error"
        props.text = data
        props.css = "w3-red w3-text-white"
    }
    showResponseAlert(props)
    setTimeout(hideResponseAlert, 4000)
}


//Show the total records in the table
function setTotalRecords(data) {
    totalRecords.innerHTML = data.length
}


//Show the record modal
function showRecordModal() {
    recordModal.style.display = 'block'
}

//Hide the record modal
function hideRecordModal() {
    recordModal.style.display = 'none'
}