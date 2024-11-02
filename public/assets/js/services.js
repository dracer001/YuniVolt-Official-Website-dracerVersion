console.log("sevices");

var myModal = new bootstrap.Modal(document.getElementById('service-booking-modal'))


document.querySelectorAll(".book-btn").forEach(btn =>{
    btn.addEventListener("click", ()=>{
        clearMessage();
        const userEmail = document.getElementById("user-email")?.value ?? "";
        console.log(userEmail);
        if (userEmail.length === 0) {
            var signUpModal = bootstrap.Modal.getOrCreateInstance(document.getElementById("sign-in-modal"));
            signUpModal.show();
            return;
        }
        let service = btn.getAttribute("data-bs-service");
        document.getElementById("service-select").value=service;
        myModal.show();
    })
})

document.getElementById("service-booking-form").addEventListener("submit", (event)=>{
    displayLoading();
    event.preventDefault();
    const service = document.getElementById("service-select").value
    console.log(service);
    const formData = new FormData(event.target);
    formData.append("service", service);
    // Send data using fetch
    fetch(`${ROOT_URL}/?url=services/bookService`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(response => JSON.parse(response))
    .then(response => {
        console.log(response);
        if (response.status === "success") {
            displaySuccess()    
        } else{
            displayError();
            setTimeout(() => {
                clearMessage();
            }, 5000);
        }
    })
    .catch(error => {
        console.log(error);
        displayError();
        setTimeout(() => {
            clearMessage();
        }, 5000);
    });
})




document.getElementById("sendWhatsapp").addEventListener("click", (event)=>{
    event.preventDefault();
    clearMessage();
    const service = document.getElementById("service-select").value;
    const booker = document.getElementById("user-fullname")?.value ?? "" + document.getElementById("user-lastname")?.value ?? "";;
    const response_email = document.getElementById("response-email").value;
    const book_message = document.getElementById("book-message").value;
    
    // WhatsApp number (replace with your target WhatsApp number)
    const phoneNumber = "+2348174877327";  // Example: international format without the "+" symbol

    // Build the WhatsApp message content
    const whatsappMessage = `Name: ${booker}\nResponse Email: ${response_email}\nMessage: ${book_message}\nService:${service}`;

    // Encode the message content for URL
    const encodedMessage = encodeURIComponent(whatsappMessage);

    // WhatsApp URL
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

    // Open WhatsApp
    window.open(whatsappURL, '_blank');
    const formData = new FormData();
    formData.append("service", service);
    formData.append("message", book_message);
    formData.append("response_email", response_email);
    // Send data using fetch
    fetch(`${ROOT_URL}/?url=services/bookService`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(response => {
        console.log(response);
        response = JSON.parse(response);
        console.log(response);
        event.target.reset();
    })
    .catch(error => {
        console.log(error);
    });
})


var loadingInterval;
function displaySuccess(){
    clearInterval(loadingInterval); 
    let btn = document.getElementById("book-service-btn")
    btn.innerText = "BOOKED";
    btn.style.backgroundColor = "green";
    btn.disabled = true;
}
function displayLoading(){
    let btn = document.getElementById("book-service-btn")
    btn.innerText = "Booking";
    let i = 1;
    loadingInterval = setInterval(() => {
        btn.innerText += "."
        i++;
        if (i === 3) {
            btn.innerText = "Booking";
        }
    }, 1000);
    btn.disabled = true;
}
function displayError(){
    let btn = document.getElementById("book-service-btn");
    clearInterval(loadingInterval);
    btn.innerText = "Error";
    btn.style.backgroundColor = "red";
    setTimeout(() => {
        clearMessage();
    }, 3000);
}

function clearMessage(){
    let btn = document.getElementById("book-service-btn")
    btn.innerText = "Book this service";
    btn.style.background = "#ff7b00";
    btn.disabled = false;
}