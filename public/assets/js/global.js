const ROOT_URL = document.getElementById('root-url').value;

const sendJsonForm = async (formData, location, responseCallback, errorCallback = null)=>{

  // Send data using fetch
  fetch(location, {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(response => {
    try {
      console.log("response text", response);
      // Attempt to parse the response as JSON
      response = JSON.parse(response);
      return responseCallback(response);
    } catch (error) {
        // Catch any errors from JSON parsing
        console.error("Error parsing JSON:", error);
        let error_response = (errorCallback) ? errorCallback(error) : console.log(error);
        return error_response;
    }
  })
  .catch(error => {
    // Catch any other errors, such as network issues
    console.error("Error in fetch:", error);
    let error_response = (errorCallback) ? errorCallback(error) : console.log(error);
    return error_response;
  });

}



function displayErrors(form, message) {
  form.querySelector(".server-msg").innerHTML = `
      <div class="alert alert-danger p-2"><i class='bi bi-info-circle-fill'></i> ${message}</div>
  `;
}

function displaySuccess(form, message) {
  form.querySelector(".server-msg").innerHTML = `
  <div class="alert alert-success p-2"><i class='bi bi-check-circle-fill'></i> ${message}</div>`;
}


function notify(message, type) {
  console.log("notify", message)
  message = (type == "error") ?
    `<div class="alert alert-danger" role="alert">${message}</div>` :
    (type == "success") ?
    `<div class="alert alert-success" role="alert">${message}</div>`:
    message;
  let notifyEl = document.getElementById("notify")
  notifyEl.innerHTML = message;
  notifyEl.classList.add("display");
  setTimeout(() => {
    notifyEl.classList.remove("display");
  }, 3000);
}
