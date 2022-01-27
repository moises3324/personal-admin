//------ CRUD ------
async function addRecord(formData, url) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function deleteRecord(formData, url) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function updateRecord(formData, url) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function getRecord(formData, url) {
    return await fetch(url, {
        method: "POST",
        body: formData
    })
}

async function getAllRecords(url) {
    return await fetch(url)
}