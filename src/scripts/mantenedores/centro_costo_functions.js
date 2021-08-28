const url = "../app/controllers/CentroCostoController.php"

const btnNew = document.querySelector("#btnNew")
const btnSave = document.querySelector("#btnSave")
const btnCancelModal = document.querySelector("#btnCancelModal")
const centroCostoTable = document.querySelector("#centro-costo-data")
const totalCentroCosto = document.querySelector("#totalCentroCosto")

btnSave.addEventListener("click", () => {
    let formData = new FormData()
    let form = document.forms["centro-costo-form"]
    form.forEach(element => {
        formData.append(element.name, element.value)
    })
    if (btnSave.textContent === "Agregar") {
        formData.append("action", "create")
        addCentroCosto(formData)
    } else {
        formData.append("action", "update")
        updateCentroCosto(formData)
    }
    cleanInputs(form)
})

window.addEventListener("load", () => {
    getAllCentrosCostros()
})

centroCostoTable.addEventListener("click", (e) => {
    if (e.target.classList.contains("btnDelete")) {
        let formData = new FormData()
        const id = e.target.getAttribute("data-id")
        const name = e.target.parentElement.parentElement.firstElementChild.innerHTML
        formData.append("action", "delete")
        formData.append("centro-costo-id", id)
        formData.append("name", name)
        deleteCentroCosto(formData)
    } else if (e.target.classList.contains("btnEdit")) {
        let formData = new FormData()
        const id = e.target.getAttribute("data-id")
        formData.append("action", "getOne")
        formData.append("centro-costo-id", id)
        getOneCentroCosto(formData)
        btnSave.textContent = "Actualizar"
    }
})

function cleanInputs(elements) {
    elements.forEach(element => {
        element.value = ""
    })
}

function showInfo(data) {
    const centroCostoId = document.querySelector("#centro-costo-id")
    const centroCostoName = document.querySelector("#centro-costo-name")
    const centroCostoDescription = document.querySelector("#centro-costo-description")
    centroCostoId.value = data.id
    centroCostoName.value = data.name
    centroCostoDescription.value = data.description
}

function showAlert(message) {
    console.log(message)
}

function formListTemplate(formElements) {
    let template = '';
    formElements.forEach(fe => {
        template += `
                  <tr>
                    <td>${fe.name}</td>
                    <td>${fe.description}</td>
                    <td class="text-center">
                        <i class="far fa-edit btn btn-info btn-sm btnEdit" 
                        data-id="${fe.id}"
                        data-mdb-toggle="modal"
                        data-mdb-target="#centro_costo_modal"
                        >    
                        </i>
                    </td>
                    <td class="text-center">                        
                        <i class="far fa-trash-alt btn btn-danger btn-sm btnDelete" data-id="${fe.id}"></i>
                    </td>
                  </tr>
                `
    })
    centroCostoTable.innerHTML = template
}

btnNew.addEventListener("click", () => {
    btnSave.textContent = "Agregar"
})

btnCancelModal.addEventListener("click", () => {
    let form = document.forms["centro-costo-form"]
    cleanInputs(form)
})

//------ CRUD ------
async function addCentroCosto(formData) {
    await fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.text()).then(data => {
        showAlert(data)
        getAllCentrosCostros()
    }).catch(error => {
        console.log(error.message)
    })
}

async function deleteCentroCosto(formData) {
    if (confirm("¿Estas seguro que quieres eliminar el centro de costo " + formData.get("name") + "?")) {
        await fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.text()).then(data => {
            showAlert(data)
            getAllCentrosCostros()
        }).catch(error => {
            console.log(error.message)
        })
    }
}

async function updateCentroCosto(formData) {
    await fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.text()).then(data => {
        //showAlert(data)
        getAllCentrosCostros()
    }).catch(error => {
        console.log(error.message)
    })
}

async function getOneCentroCosto(formData) {
    await fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json()).then(data => {
        showInfo(data)
    }).catch(error => {
        console.log(error.message)
    })
}


async function getAllCentrosCostros() {
    await fetch(url).then(response => response.json()).then(data => {
        formListTemplate(data)
        totalCentroCosto.innerHTML = data.length
    })
}