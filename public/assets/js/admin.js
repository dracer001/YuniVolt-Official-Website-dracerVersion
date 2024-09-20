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