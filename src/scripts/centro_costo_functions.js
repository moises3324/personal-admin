//----- ASSIGNMENTS -----
const url = "../app/controllers/CentroCostoController.php"

const centroCostoSortItem = document.querySelector("#centroCostoSortItem")
const dataTable = document.querySelector("#dataTable")
const btnNew = document.querySelector("#btnNew")
const btnSave = document.querySelector("#btnSave")
const recordModal = document.querySelector("#recordModal")
const btnCancelRecordModal = document.querySelector("#btnCancelRecordModal")
const totalRecords = document.querySelector("#totalRecords")
const responseAlert = document.querySelector("#responseAlert")
const props = {icon: "", text: "", css: ""}
const recordId = document.querySelector("#centro-costo-id")
const recordName = document.querySelector("#centro-costo-name")
const recordDescription = document.querySelector("#centro-costo-description")


//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllRecords()
})

//When is clicked inside the record table
dataTable.addEventListener("click", (e) => {
    let formData = new FormData()
    if (e.target.classList.contains("btnDelete")) {
        const id = e.target.getAttribute("data-id")
        const name = e.target.getAttribute("data-name")
        formData.set("action", "delete")
        formData.set("centro-costo-id", id)
        formData.set("name", name)
        if (confirm("¿Esta seguro que quiere eliminar el registro " + formData.get("name") + "?")) {
            callDeleteRecord(formData)
        }
    } else if (e.target.classList.contains("btnEdit")) {
        const id = e.target.getAttribute("data-id")
        formData.set("action", "getOne")
        formData.set("centro-costo-id", id)
        callGetRecord(formData)
        btnSave.textContent = "Actualizar"
        showRecordModal()
    }
})

//When the button "Nuevo registro" is clicked
btnNew.addEventListener("click", () => {
    btnSave.textContent = "Agregar"
    showRecordModal()
})

//When the button "Cancel" in the record modal is clicked
btnCancelRecordModal.addEventListener("click", () => {
    hideRecordModal()
})

//When the button "Agregar" or "Actualizar" are clicked in the record modal
btnSave.addEventListener("click", () => {
    let formData = new FormData()
    const formElements = document.forms['centroCostoForm']

    for (let element of formElements) {
        formData.append(element.name, element.value)
    }
    if (btnSave.textContent === "Agregar") {
        formData.append("action", "create")
        callAddRecord(formData)
    } else {
        formData.append("action", "update")
        callUpdateRecord(formData)
    }
    hideRecordModal()
    cleanInputs(formElements)
})

//When the button "Cancelar" is clicked in the record modal
btnCancelRecordModal.addEventListener("click", () => {
    const formElements = document.forms['centroCostoForm']
    cleanInputs(formElements)
})

centroCostoSortItem.addEventListener("change", ()=>{
    w3.sortHTML('#centroCostoTable', '.item', 'td:nth-child(1)')
})


//----- FUNCTIONS -----
//Generate a table with the records required
function generateTable(records) {
    let template = '';
    records.forEach(record => {
        template += `
                  <tr class="item">
                    <td>${record.name}</td>
                    <td>${record.description}</td>
                    <td class="w3-center">
                        <span  
                        data-id="${record.id}" 
                        data-name="${record.name}"
                        class="material-icons btnEdit w3-button w3-white w3-border-0 w3-ripple"
                        >edit</span>   
                    </td>                        
                    <td class="w3-center">
                        <span
                        data-id="${record.id}" 
                        data-name="${record.name}" 
                        class="material-icons btnDelete w3-button w3-white w3-border-0 w3-hover-red w3-hover-text-white 
                        w3-ripple" 
                        >delete</span>
                    </td>
                  </tr>
        `
    })
    dataTable.innerHTML = template
}

//Show the total records in the table
function setTotalRecords(data) {
    totalRecords.innerHTML = data.length
}

//Show the selected record information in the record modal (edit mode)
function showRecordInformation(data) {
    recordId.value = data.id
    recordName.value = data.name
    recordDescription.value = data.description
}

//Show the record modal
function showRecordModal() {
    recordModal.style.display = 'block'
}

//Hide the record modal
function hideRecordModal() {
    recordModal.style.display = 'none'
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
    setTimeout(hideResponseAlert, 2000)
}

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

//Clean up the inputs in the form
function cleanInputs(elements) {
    for (let element of elements) {
        element.value = ''
    }
}


//----- CALLS -----
const callGetAllRecords = () => {
    getAllRecords().then(response => response.json()).then(data => {
        generateTable(data)
        setTotalRecords(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callDeleteRecord = (record) => {
    deleteRecord(record).then(response => response.text()).then(data => {
        callGetAllRecords()
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callGetRecord = (record) => {
    getRecord(record).then(response => response.json()).then(data => {
        showRecordInformation(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callAddRecord = (record) => {
    addRecord(record).then(response => response.text()).then(data => {
        callGetAllRecords()
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callUpdateRecord = (record) => {
    updateRecord(record).then(response => response.text()).then(data => {
        callGetAllRecords()
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}