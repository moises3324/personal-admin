//----- ASSIGNMENTS -----
const urlEmpleado = "../app/controllers/EmpleadoController.php"

const empleadoSortItem = document.querySelector("#empleadoSortItem")
const empleadoId = document.querySelector("#empleado-id")
const empleadoName = document.querySelector("#empleado-names")
const empleadoFatherLastName = document.querySelector("#empleado-father-last-name")
const empleadoMotherLastName = document.querySelector("#empleado-mother-last-name")
const empleadoRut = document.querySelector("#empleado-rut")


//----- ACTIONS -----
//When the page is loaded
window.addEventListener("load", () => {
    callGetAllEmpleados()
})

//When is clicked inside the record table
dataTable.addEventListener("click", (e) => {
    let formData = new FormData()
    if (e.target.classList.contains("btnMoreInfo")) {
        const id = e.target.getAttribute("data-id")
        formData.set("action", "getOne")
        formData.set("empleado-id", id)
        callGetEmpleado(formData)
            //add content
    }
})

empleadoSortItem.addEventListener("change", () => {
    w3.sortHTML('#empleadoTable', '.item', 'td:nth-child(1)')
})


//----- FUNCTIONS -----
//Generate a table with the records required
function generateTable(records) {
    let template = '';
    records.forEach(record => {
        template += `
            <tr class="item">
                <td>${record.rut}</td>
                <td>${record.names}</td>
                <td>${record.fatherLastName}</td>
                <td>${record.motherLastName}</td>
                <td class="w3-center">
                    <span data-id="${record.id}" 
                        data-name="${record.names}"
                        class="btnMoreInfo w3-button w3-white w3-border-0 w3-ripple"
                    >
                        Más info
                    </span>   
                </td> 
            </tr>
        `
    })
    dataTable.innerHTML = template
}


//----- CALLS -----
const callGetAllEmpleados = () => {
    getAllRecords(urlEmpleado).then(response => response.json()).then(data => {
        generateTable(data)
        setTotalRecords(data)
    }).catch(error => {
        console.log(error);
    });
}


const callGetEmpleado = (record) => {
    getRecord(record, urlEmpleado).then(response => response.json()).then(data => {
        showRecordInformation(data)
    }).catch(error => {
        console.log(error)
    })
}