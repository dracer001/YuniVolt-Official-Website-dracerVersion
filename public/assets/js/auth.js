console.log("Hello auth");

const ROOT_URL = document.getElementById('root-url').value;
const signUpForm = document.getElementById('sign-up-form');
const errorContainer = document.getElementById('error-container'); // Assume there's a container for general error messages

signUpForm.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get input elements
    const regName = document.getElementById('reg-name');
    const regEmail = document.getElementById('reg-email');
    const regPassword = document.getElementById('reg-password');
    const cPassword = document.getElementById('c-password');

    // Clear previous errors
    clearErrors();

    // Validate inputs
    let valid = true;
    if (!filterInput(regName, "name")) valid = false;
    if (!filterInput(regEmail, "email")) valid = false;
    if (!filterInput([regPassword, cPassword], "password")) valid = false;

    if (!valid) return;

    // Show loader
    showLoader();

    // Send AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${ROOT_URL}/?url=signup`);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            console.log(this.responseText);

            hideLoader();

            // Process response
            let response;
            try {
                response = JSON.parse(this.responseText);
            } catch (e) {
                response = { status: "error", message: "Invalid JSON response" };
                return false;
            }
            console.log(response);
            if (response.status === "error") {
                displayErrors(response.message);
            } else {
                displaySuccess(response.message);
            }
        }
    };
    xhttp.send(`lastname=${encodeURIComponent(regName.value.split(' ')[1] || '')}&firstname=${encodeURIComponent(regName.value.split(' ')[0] || '')}&email=${encodeURIComponent(regEmail.value)}&password=${encodeURIComponent(regPassword.value)}`);
});

function filterInput(input, type) {

    let value;
    if (Array.isArray(input)) {
        console.log("array found");
        if (input[0].value.trim().length === 0) {
            console.log(input[0])
        displayError(input[0], "field cannot be empty");
        return false;
        } 
        if (input[0].value !== input[1].value) {
            displayError(input[1], "Passwords do not match");
            return false;
        }
        value = input[0].value;

    } else {
        if (input.value.trim().length === 0) {
        displayError(input, "field cannot be empty");
        return false;
        } 
        value = input.value.trim();
    }

    switch (type) {
        case "name":
            let names = value.trim().split(' ');
            if (names.length < 2) {
                displayError(input, "Please enter both first name and last name");
                return false;
            }
            const [firstName, lastName] = names;
            if (firstName.length < 3 || !/^[A-Za-z]+$/.test(firstName) || lastName.length < 3 || !/^[A-Za-z]+$/.test(lastName)) {
                displayError(input, "Both first and last names must be at least 3 characters long and contain only letters");
                return false;
            }
            break;
        case "email":
            if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(value)) {
                displayError(input, "Invalid email format");
                return false;
            }
            break;
        case "password":
            if (value.length < 6) { // Example minimum length
                displayError(input[0], "Password must be at least 6 characters long");
                return false;
            }
            break;
        default:
            break;
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

function clearErrors() {
    document.querySelectorAll('.form-group .invalid-feedback').forEach(el => el.style.display = 'none');
    document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
}

function showLoader() {
    document.getElementById('loader').style.display = 'block'; // Assume there's an element with id 'loader'
}

function hideLoader() {
    document.getElementById('loader').style.display = 'none';
}

function displayErrors(message) {
    errorContainer.innerHTML = `<div class="alert alert-danger">${message}</div>`;
}

function displaySuccess(message) {
    errorContainer.innerHTML = `<div class="alert alert-success">${message}</div>`;
}
