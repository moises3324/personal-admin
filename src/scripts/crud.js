//------ CRUD ------
async function addRecord(formData) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function deleteRecord(formData) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function updateRecord(formData) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function getRecord(formData) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function getAllRecords() {
    return await fetch(url)
}