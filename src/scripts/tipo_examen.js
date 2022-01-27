//----- ASSIGNMENTS -----
const url = "../app/controllers/TipoExamenController.php"

const tipoExamenSortItem = document.querySelector("#tipoExamenSortItem")
const recordId = document.querySelector("#tipo-examen-id")
const recordName = document.querySelector("#tipo-examen-name")
const recordDescription = document.querySelector("#tipo-examen-description")


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
        formData.set("tipo-examen-id", id)
        if (confirm("¿Esta seguro que quiere eliminar el registro " + name + "?")) {
            callDeleteRecord(formData)
        }
    } else if (e.target.classList.contains("btnEdit")) {
        const id = e.target.getAttribute("data-id")
        formData.set("action", "getOne")
        formData.set("tipo-examen-id", id)
        callGetRecord(formData)
        btnSave.textContent = "Actualizar"
        showRecordModal()
    }
})


//When the button "Agregar" or "Actualizar" are clicked in the record modal
btnSave.addEventListener("click", () => {
    let formData = new FormData()
    const formElements = document.forms['tipoExamenForm']

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
    const formElements = document.forms['tipoExamenForm']
    cleanInputs(formElements)
})

tipoExamenSortItem.addEventListener("change", () => {
    w3.sortHTML('#tipoExamenTable', '.item', 'td:nth-child(1)')
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

//Show the selected record information in the record modal (edit mode)
function showRecordInformation(data) {
    recordId.value = data.id
    recordName.value = data.name
    recordDescription.value = data.description
}

//Clean up the inputs in the form
function cleanInputs(elements) {
    for (let element of elements) {
        element.value = ''
    }
}


//----- CALLS -----
const callGetAllRecords = () => {
    getAllRecords(url).then(response => response.json()).then(data => {
        generateTable(data)
        setTotalRecords(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callDeleteRecord = (record) => {
    deleteRecord(record, url).then(response => response.text()).then(data => {
        callGetAllRecords(url)
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callGetRecord = (record) => {
    getRecord(record, url).then(response => response.json()).then(data => {
        showRecordInformation(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callAddRecord = (record) => {
    addRecord(record, url).then(response => response.text()).then(data => {
        callGetAllRecords(url)
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}

const callUpdateRecord = (record) => {
    updateRecord(record, url).then(response => response.text()).then(data => {
        callGetAllRecords(url)
        handleResponseAlert(data)
    }).catch(error => {
        console.log(error.message)
    })
}