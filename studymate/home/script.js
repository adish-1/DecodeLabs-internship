    const addReminderButton = document.querySelector(".add-reminder");
    const addNoteButton = document.querySelector(".add-note");
    const reminederList = document.querySelector(".reminder-section ul");
    const noteList = document.querySelector(".notes-section ul");

    async function loadData(){
        try{

            const reminderResponse= await fetch("/studymate/api/reminder_api/get-reminder.php",{
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
        const notesResponse=await fetch("/studymate/api/notes_api/get-note.php",{
            method:"GET",
            credentials:"include"   
        });
        const notesData=await notesResponse.json();
        if(!notesData.success){
            window.location.href="/studymate/login/";
            return;
        }
            noteList.innerHTML="";
            notesData.notes.forEach(text => {
            const single = document.createElement("div");
            single.classList.add("notes-div");
            const icon =document.createElement("i");
            icon.className="fa-solid fa-trash delete-icon";
            const span = document.createElement("span");
            span.textContent = text;

            icon.addEventListener("click",async function(){
                const response = await fetch("/studymate/api/notes_api/delete-note.php", {
                    method: "POST",
                    credentials: "include",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ content: text })
                });
                const data = await response.json();
                if(data.success) {
                    alert("Note Deleted SuccessFully");
                    single.remove();
                } else {
                    alert("Failed to delete note.");
                }
            });
            single.appendChild(span);
            single.appendChild(icon);
            noteList.appendChild(single);
        });
    }
    catch(error){
        console.error("Standard loader encountered a connection error:", error);
    }
    }
    document.addEventListener("DOMContentLoaded",loadData);
    function showPopup(type){
        const popup = document.createElement("div");
        popup.classList.add("popup")
        const popupBox = document.createElement("div");
        popupBox.classList.add("popup-box");
        const heading = document.createElement("h3");
        const input = document.createElement("input");
        input.type = "text";
        const addButton = document.createElement("button");
        const cancleButton = document.createElement("button");
        if(type === "reminder"){
            heading.textContent = "Add Reminder";
            input.placeholder = "Enter the Reminder";
            addButton.textContent = "Add Reminder";
        }
        else{
            heading.textContent = "Add Note";
            input.placeholder = "Enter the Note";
            addButton.textContent = "Add Note";
        }
        cancleButton.textContent = "Cancle";

        popupBox.appendChild(heading);
        popupBox.appendChild(input);
        popupBox.appendChild(addButton);
        popupBox.appendChild(cancleButton);
    
        popup.appendChild(popupBox);
        document.body.appendChild(popup);
        input.focus();

        addButton.addEventListener("click", async function(){
            const text = input.value.trim();
            if(text === ""){
                return;
            }
            if(type ==="reminder"){
                try{
                    const response=await fetch("/studymate/api/reminder_api/add-reminder.php",{
                        method:"POST",
                        credentials:"include",
                        headers:{
                            "Content-Type":"application/json"
                        },
                        body:JSON.stringify({
                            content : text
                        })
                    });
                    
                    const data=await response.json();
                    
                    if(data.success)
                        {
                        const single = document.createElement("div");
                        single.classList.add("reminder-div");
                        const checkbox = document.createElement("input");
                        checkbox.type = "checkbox";
                        const span = document.createElement("span");
                        span.textContent = text;
                        single.appendChild(checkbox);
                        single.appendChild(span);
                        reminederList.appendChild(single);
                        } 
                    else{
                    alert(data.message ||"Reminder Creation Failed");
                    }
                }
                catch (error) {
                console.error("Error submitting form:", error);
                }
        }
            else{
                try{
                    const response=await fetch("/studymate/api/notes_api/add-note.php",{
                        method:"POST",
                        credentials:"include",
                        headers:{
                            "Content-Type":"application/json"
                        },
                        body:JSON.stringify({
                            content : text
                        })
                    });
                    
                    const data=await response.json();

                    if(data.success){
                        const single = document.createElement("div");
                        single.classList.add("notes-div");
                        const span = document.createElement("span");
                        span.textContent = text;
                        single.appendChild(span);
                        noteList.appendChild(single);
                    }
                else{
                    alert(data.message ||"Note Creation Failed");
                }
                }
                catch (error) {
                console.error("Error submitting form:", error);
                }
            
            }
            popup.remove();
        });
        cancleButton.addEventListener("click",function(){
            popup.remove();
        });
    }

        addReminderButton.addEventListener("click",function(){
            showPopup("reminder");
        });
        addNoteButton.addEventListener("click",function(){
            showPopup("note");
        });

