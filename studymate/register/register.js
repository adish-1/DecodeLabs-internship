const inputname = document.querySelector("#name");
const inputusername = document.querySelector("#username");
const inputemail = document.querySelector("#email");
const inputage = document.querySelector("#age");
const inputmobile = document.querySelector("#mobile");
const inputpassword = document.querySelector("#password");
const registerbutton = document.querySelector("#register-button");

registerbutton.addEventListener("click", async function(event) {
    event.preventDefault();

    const name = inputname.value;
    const username = inputusername.value;
    const email = inputemail.value;
    const age = inputage.value;
    const mobile = inputmobile.value;
    const password = inputpassword.value;
    inputname.required = true;
    inputusername.required = true;
    inputemail.required = true;
    inputage.required = true;
    inputmobile.required = true;
    inputpassword.required = true;
    try {
        const response = await fetch("/studymate/api/register_api/index.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                name: name,
                username: username,
                email: email,
                age: age,
                mobile: mobile,
                password: password
            })
        });
        
        const data = await response.json();
        
        if (data) {
            const success = document.createElement("div");
            success.classList.add("card-main");
            const successCard = document.createElement("div");
            const heading = document.createElement("h3");
            const mess=document.createElement("p");
            const redirectionLink = document.createElement("a");

            if (data.success) {
                successCard.classList.add("success-card");
                heading.textContent = "Account Created";
                mess.textContent=data.message;
                redirectionLink.href = "/studymate/login/";
                redirectionLink.textContent = "Login";
            } else {
                successCard.classList.add("error-card");
                heading.textContent = "Account Creation Failed";
                mess.textContent=data.message;
                redirectionLink.href = "/studymate/register/";
                redirectionLink.textContent = "Try Again";
            }
            successCard.appendChild(heading);
            successCard.appendChild(mess);
            successCard.appendChild(redirectionLink);
            success.appendChild(successCard);
            document.body.appendChild(success);
        }
    } catch (error) {
        console.error("Error submitting form:", error);
    }
});
