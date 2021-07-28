const url = "../app/controllers/CentroCostoController.php"
const centroCostoTable = document.querySelector("#centro-costo-data")

function addCentroCosto(formData) {
    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.text()).then(data => {
        showAlert(data)
        getAllCentrosCostros()
    }).catch(error => {
        console.log(error.message)
    })
}

function deleteCentroCosto(formData) {
    if (confirm("¿Estas seguro que quieres eliminar el centro de costo " + formData.get("name") + "?")) {
        fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.text()).then(data => {
            getAllCentrosCostros()
        }).catch(error => {
            console.log(error.message)
        })
    }
}

function updateCentroCosto(formData) {
    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.text()).then(data => {
        //showAlert(data)
        getAllCentrosCostros()
    }).catch(error => {
        console.log(error.message)
    })
}

function getOneCentroCosto(formData) {
    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json()).then(data => {
        showInfo(data)
    }).catch(error => {
        console.log(error.message)
    })
}


function getAllCentrosCostros() {
    fetch(url).then(response => response.json()).then(data => {
        formListTemplate(data)
    })
}

function formListTemplate(formElements) {
    let template = '';
    formElements.forEach(fe => {
        template += `
                  <tr>
                    <td>${fe.name}</td>
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

function showAlert(message) {
    switch (message) {
        case "Successful":
            const alertSuccess = document.querySelector(".alert-success")
            alertSuccess.classList.remove("d-none")
            alertSuccess.classList.add("d-block")
            setTimeout(() => {
                alertSuccess.classList.remove("d-block")
                alertSuccess.classList.add("d-none")
            }, 3000)
            break;
        case "Error":

        default:
            const alertDanger = document.querySelector(".alert-danger")
            alertDanger.classList.remove("d-none")
            alertDanger.classList.add("d-block")
            setTimeout(() => {
                alertDanger.classList.remove("d-block")
                alertDanger.classList.add("d-none")
            }, 3000)
            break;
    }
}