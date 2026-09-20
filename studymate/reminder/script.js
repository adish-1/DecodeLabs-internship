async function loadData(){
        try{
            const reminederList = document.querySelector(".reminder-section-list");
            const reminderResponse= await fetch("/studymate/api/reminder_api/main-reminder-api.php",{
                method:"GET",
                credentials:"include"
            });
            const reminderData=await reminderResponse.json();

            if(!reminderData.success){
                window.location.href="/studymate/login";
                return;
            }
            reminederList.innerHTML="";
            reminderData.reminders.forEach(text => {
                const single = document.createElement("div");
                single.classList.add("reminder-div");
                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                const span = document.createElement("span");
                span.textContent = text;

                checkbox.addEventListener("change",async function(){
                    if(checkbox.checked){
                        const response= await fetch("/studymate/api/reminder_api/delete-reminder.php",{
                        method:"POST",
                        credentials:"include",
                        headers:{
                          "Content-Type": "application/json"
                        },
                        body:JSON.stringify({
                            content:text
                        })
                    });
                    const data=await response.json();
                    if(data.success){
                        single.remove();
                        alert("Reminder removed Successfully");
                    }
                    else{
                        checkbox.checked=false;
                        alert("Failed to Delete Reminder");
                    }
                }
                });
                
                single.appendChild(checkbox);
                single.appendChild(span);
                reminederList.appendChild(single);
            });
        }
    catch(error){
        console.error("Standard loader encountered a connection error:", error);
    }
    }
    document.addEventListener("DOMContentLoaded",loadData);