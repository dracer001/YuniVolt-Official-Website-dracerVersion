console.log("academy");


document.querySelectorAll(".course-reg-btn").forEach(btn =>{
    btn.addEventListener("click", ()=>{
        const userEmail = document.getElementById("user-email")?.value ?? "";
        console.log(userEmail);
        if (userEmail.length === 0) {
            var signUpModal = bootstrap.Modal.getOrCreateInstance(document.getElementById("sign-in-modal"));
            signUpModal.show();
            return;
        }
        displayLoading(btn);
        const course_id = btn.getAttribute("data-course-id");
        const formData = new FormData();
        formData.append("course_id", course_id);
        sendJsonForm(formData, `${ROOT_URL}/?url=academy/registerCourse`, (response)=>{
            console.log(response);
            if (response?.success) {
                displaySuccess(btn)    
            } else{
                displayError(btn);
                setTimeout(() => {
                    clearMessage(btn);
                }, 5000);
            }
        }, (error)=>{
            console.log(error);
            displayError(btn);
            setTimeout(() => {
                clearMessage(btn);
            }, 5000);
        });
    })
})







document.querySelectorAll(".whatsapp-course-reg").forEach(btn => {
    btn.addEventListener("click", ()=>{
        let reg_btn = btn.parentElement.querySelector('.course-reg-btn');
        clearMessage(reg_btn);
        const course_id = btn.getAttribute("data-course-id");
        const course_title = btn.getAttribute("data-course-title");
        
        const user = document.getElementById("user-fullname")?.value ?? "" + document.getElementById("user-lastname")?.value ?? "";;
        const phoneNumber = "+2348174877327";  // Example: international format without the "+" symbol

        const whatsappMessage = `Name: ${user}\nCourse Tite: ${course_title}\nCourse Id: ${course_id}\nAction: Register`;

        const encodedMessage = encodeURIComponent(whatsappMessage);

        const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

        window.open(whatsappURL, '_blank');
    })
});


var loadingInterval;
function displaySuccess(btn){
    clearInterval(loadingInterval); 
    btn.innerText = "Registered";
    btn.classList.remove("btn-main");
    btn.classList.add("btn-success", "btn");
    btn.disabled = true;
    btn.parentElement.querySelector('.whatsapp-course-reg').classList.add("d-none");
}

function displayLoading(btn){
    btn.innerText = "Loading";
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
function displayError(btn){
    clearInterval(loadingInterval);
    btn.innerText = "Error";
    btn.classList.remove("btn-main");
    btn.classList.add("btn-danger", "btn");
    setTimeout(() => {
        clearMessage(btn);
    }, 3000);
}

function clearMessage(btn){
    btn.innerText = "Sign Up";
    btn.classList.remove("btn");
    btn.classList.add("btn-main");
    btn.disabled = false;
}