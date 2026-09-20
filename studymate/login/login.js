const inputusername=document.querySelector("#username");
const inputpassword=document.querySelector("#password");
const loginButton=document.querySelector("#login-button");
loginButton.addEventListener("click",async function(event){
    event.preventDefault();
    const username=inputusername.value;
    const password=inputpassword.value;
    try{
        const response=await fetch("/studymate/api/auth/login.php",{
            method:"POST",
            credentials:"include",
            headers:{
                   "Content-Type":"application/json"

                    },
            body:JSON.stringify({
                username:username,
                password:password
            })
        });
        const data=await response.json();
        if(data){
            const success = document.createElement("div");
            success.classList.add("card-main");
            const successCard = document.createElement("div");
            const heading = document.createElement("h3");
            const mess=document.createElement("p");
             if (data.success) {
                successCard.classList.add("success-card");
                heading.textContent = "Login Successfull!";
                mess.textContent=data.message;

                successCard.appendChild(heading);
                successCard.appendChild(mess);
                success.appendChild(successCard);
                document.body.appendChild(success);

                setTimeout( ()=>{
                window.location.href="/studymate/home/index.php";
                },1500);
               }
            else {
                 successCard.classList.add("error-card");
                 heading.textContent = "Login Failed";
                 mess.textContent = data.message;
                 const redirectionLink = document.createElement("a");
                redirectionLink.href = "#";
                redirectionLink.textContent = "Try Again";
                redirectionLink.addEventListener("click", (e) => {
                    e.preventDefault();
                    success.remove();
                });
                successCard.appendChild(heading);
                successCard.appendChild(mess);
                successCard.appendChild(redirectionLink);
                success.appendChild(successCard);
                document.body.appendChild(success); 
            }
        }
}
    catch (error) {
        console.error("Error submitting form:", error);
    }
});