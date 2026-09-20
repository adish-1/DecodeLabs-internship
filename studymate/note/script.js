async function loadData(){
        try{
        const noteList=document.querySelector(".note-section-list");
        const notesResponse=await fetch("/studymate/api/notes_api/main-note-api.php",{
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