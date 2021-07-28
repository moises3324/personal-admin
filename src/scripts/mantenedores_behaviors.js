const btnSave = document.querySelector("#btnSave")
const btnCancelModal = document.querySelector("#btnCancelModal")
const dataTable = document.querySelector("#centro-costo-data")

btnSave.addEventListener("click", () => {
    let formData = new FormData()
    let form = document.forms["centro-costo-form"]
    form.forEach(element => {
        formData.append(element.name, element.value)
    })
    if(btnSave.textContent === "Agregar"){
        formData.append("action", "create")
        addCentroCosto(formData)
    }else {
        formData.append("action", "update")
        updateCentroCosto(formData)
        btnSave.textContent = "Agregar"
    }
    cleanInputs(form)
})

window.addEventListener("load", () => {
    getAllCentrosCostros()
})

dataTable.addEventListener("click", (e) => {
    if (e.target.classList.contains("btnDelete")) {
        let formData = new FormData()
        const id = e.target.getAttribute("data-id")
        const name = e.target.parentElement.parentElement.firstElementChild.innerHTML
        formData.append("action", "delete")
        formData.append("id", id)
        formData.append("name", name)
        deleteCentroCosto(formData)
    } else if (e.target.classList.contains("btnEdit")) {
        let formData = new FormData()
        const id = e.target.getAttribute("data-id")
        formData.append("action", "getOne")
        formData.append("centro-costo-id", id)
        getOneCentroCosto(formData)
        document.getElementById("centro-costo-name").focus()
        btnSave.textContent = "Actualizar"
    }
})

function cleanInputs(elements) {
    elements.forEach(element => {
        element.value = ""
    })
}

function showInfo(data){
    const centroCostoId = document.querySelector("#centro-costo-id")
    const centroCostoName = document.querySelector("#centro-costo-name")
    centroCostoId.value = data.id
    centroCostoName.value = data.name
}

btnCancelModal.addEventListener("click", ()=>{
    let form = document.forms["centro-costo-form"]
    cleanInputs(form)
})