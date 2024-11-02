console.log("Hello Auth");

const signUpForm = document.getElementById('sign-up-form') ?? false;
const signInForm = document.getElementById('sign-in-form') ?? false;
if (signUpForm) {
    signUpForm.addEventListener('submit', (e) => {
        // prevent default sign up
        e.preventDefault();

        // create form object
        const formData = new FormData(e.target);

        // Clear previous errors
        clearErrors(signUpForm);

        // Get input elements
        const regName = document.getElementById('reg-name');
        const regEmail = document.getElementById('reg-email');
        const regPassword = document.getElementById('reg-password');
        const cPassword = document.getElementById('c-password');

        // Validate inputs
        let valid = true;
        if (!filterInput(regName, "name")) valid = false;
        if (!filterInput(regEmail, "email")) valid = false;
        if (!filterInput([regPassword, cPassword], "password")) valid = false;
        if (!valid) return;

        showLoader(signUpForm);
        formData.append("lastname", regName.value.split(' ')[1] || '');
        formData.append("firstname", regName.value.split(' ')[1] || '');
        sendJsonForm(formData, `${ROOT_URL}/?url=signup`, (response)=>{
            hideLoader(signUpForm);
            if (response?.success) {
                displaySuccess(signUpForm, "Registration Successful !");

                // Log the User In Automatically
                setTimeout(() => {
                    signUpForm.querySelector(".server-msg").innerHTML = `
                        <div class="alert p-2"> please wait while we log you in </div>
                    `;  
                    sendJsonForm(formData, `${ROOT_URL}/?url=signin`, (response)=>{
                        (response?.success) ?
                            location.reload() :
                            signUpForm.querySelector(".server-msg").innerHTML = `
                            <div class="alert p-2"> we encountered an error logging you in, please log in manually</div>
                            `; 
                    }, (error)=>{
                        signUpForm.querySelector(".server-msg").innerHTML = `
                        <div class="alert p-2"> we encountered an error logging you in, please log in manually</div>
                        `; 
                    })
                }, 2000);
                    return;
            } 
            else if (response?.message) {
                displayErrors(signUpForm, response.message);
                return;
            }
            displayErrors(signUpForm, "Registration Failed !, please try again.");
            return;
        }, (error)=>{
            hideLoader(signUpForm);
            displayErrors(signUpForm, "Server Error");
            return;
        })  
    })
}


if (signInForm) {
    signInForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        clearErrors(signInForm);

        const formData = new FormData(e.target);

        if (!filterInput(document.getElementById('log-email'), "email")) return;
    
        // Show loader
        showLoader(signInForm);
    
        // Send AJAX request
        sendJsonForm(formData, `${ROOT_URL}/?url=signin`, (response)=>{
            hideLoader(signInForm);
            if(response?.success) {
                displaySuccess(signInForm, "Login Successful! Reloading Page");
                setTimeout(() => {
                    // Reload the current page
                    location.reload();
                }, 2000)
                return;
            } else if(response?.message) {
                displayErrors(signInForm, response.message);
            }
        }, (error)=>{
            displayErrors(signInForm, "Login Failed !, please try again.");
            return;
        })
    })
}



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

function clearErrors(form) {
    form.querySelectorAll('.form-group .invalid-feedback').forEach(el => el.style.display = 'none');
    form.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
    form.querySelector(".server-msg").innerHTML = "";
}

function showLoader(form) {
    form.querySelector('.loading-form').classList.remove("d-none")
    form.parentNode.parentNode.classList.add("loader-bg");
}

function hideLoader(form) {
    form.querySelector('.loading-form').classList.add("d-none")
    form.parentNode.parentNode.classList.remove("loader-bg");
}




// document.getElementById("sign-out").addEventListener("click", signOut)
// function signOut() {
//         // Send AJAX request
//         const xhttp = new XMLHttpRequest();
//         xhttp.open("POST", `${ROOT_URL}/?url=signout`);
//         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
//         xhttp.onreadystatechange = function() {
//             if (this.readyState === 4 && this.status === 200) {
//                 // Process response
//                 let response;
//                 try {
//                     response = JSON.parse(this.responseText);
//                 } catch (e) {
//                     response = { status: "error", message: "Invalid JSON response" };
//                     displayErrors(signInForm, "Server Error !");
//                     return false;
//                 }
//                 console.log(response);
//                 if (response?.status === "error") {
//                     displayErrors(signInForm, response.message);
//                 } else if(response?.status == "success") {
//                     displaySuccess(signInForm, "Login Successful !");
//                 }else{
//                     displayErrors(signInForm, "Login Failed !, please try again.");
//                 }
//             }
//         };
//         setTimeout(() => {
//         xhttp.send(`&email=${encodeURIComponent(logEmail.value)}&password=${encodeURIComponent(logPassword.value)}`);
//         }, 2000);
// }

function handleGoogleAuth(response) {
    console.log("response", response);
    const token = response.credential;

    sendJsonForm(JSON.stringify({ "token": token }), `${ROOT_URL}/?url=signup/google`, (response)=>{
        if(response?.success){
            notify("Login Successful", "success")
            setTimeout(() => {
                location.reload() 
            }, 3000);
        }else{
            notify("server error 1", "error")
        }
        return;
    }, (err)=>notify("server error 2", "error"))
}


