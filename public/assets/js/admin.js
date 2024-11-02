const ROOT_URL = document.getElementById('root-url').value
console.log(ROOT_URL);

document.getElementById("init-btn").addEventListener("click", sendPostRequest)

// JavaScript function to send the POST request via XMLHttpRequest
function sendPostRequest() {
    // Display the loader
    document.getElementById("loading").classList.remove("d-none");

    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Configure it: POST-request for the URL /server-side-script.php
    xhttp.open("POST", `${ROOT_URL}/?url=admin/app_setup`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define what happens during the request lifecycle
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Hide the loader when the response is received
            document.getElementById("loading").classList.add("d-none");
            console.log(this.responseText);

            // Process the JSON response
            let response = JSON.parse(this.responseText);
            console.log(response);
            if (response.status === 'success') {
                document.getElementById("server_status").innerText = "Initialization Successful"
            } else {
                document.getElementById("server_status").innerText = "Initialization failed"

                console.error("Error: Something went wrong");
            }
        }
    };

    xhttp.send();
}


// Display Admin Page
const Pages = document.querySelectorAll(".page");
const PageLink = document.querySelectorAll(".nav-link");


function displayPage(id) {
    console.log("id", id)
    Pages.forEach(page =>{
        console.log(page);
        if(page.id == id){
            page.style.display = 'block';
        }else{
            page.style.display = 'none';
        }

    })
}

if(PageLink.length >=1){
    PageLink.forEach(link =>{
        link.addEventListener('click', (event)=>{
            let pageID = event.target.getAttribute('data-page');
            displayPage(pageID);
        })
    })
}

displayPage("init-app")


// submit form
document.getElementById("gallary-form").addEventListener("submit", (event)=>{
    event.preventDefault();
    const formData = new FormData(event.target);

    const images = document.getElementById('imageUpload').files;
    const caption = document.getElementById('caption');
    const collection = document.getElementById('collectionSelect');
    
    let valid = true;
    if (!filterInput(images, "image")) valid = false;
    if (!filterInput(caption, "caption")) valid = false;
    if (!filterInput(collection, "collection")) valid = false;

    if (!valid) return;

    for (let i = 0; i < images.length; i++) {
        formData.append('images[]', images[i]);
    }
    formData.append('caption', caption.value.trim());
    formData.append('collection', collection.value.trim());
    console.log(formData);
    // Send data using fetch
    fetch(`${ROOT_URL}/?url=admin/uploadGallary`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        document.getElementById('server-msg').innerHTML = `<div class="alert alert-success">${data}</div>`;
        event.target.reset();
    })
    .catch(error => {
        document.getElementById('server-msg').innerHTML = `<div class="alert alert-danger">Error: ${error}</div>`;
    });
});








    function filterInput(input, type="text") {
        let value = (type == 'image') ? input : input.value.trim();
        if(value.length === 0){
            displayError(input, "field cannot be empty");
            return false;
        }
        return true;
    }

    function displayError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.invalid-feedback');
        
        // Highlight input field
        input.classList.add('is-invalid');
        
        // Show error message
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }