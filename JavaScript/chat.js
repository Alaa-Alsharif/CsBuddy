const form = document.querySelector(".typing-area"),
inputField= form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();  //preventing form from submitting
    }

sendBtn.onclick = ()=>{
    // Start Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // once message inserted to db then leave blank the input field
                scrollToBottom();
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form);  //creating new formData Object
    xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


setInterval(()=>{
    // Start Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true); // use get since we want to recieve data not to send
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            // console.log("reached here1");
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log("reached here2");
                // console.log(data);
                // if(!searchBar.classList.contains("active")){ //if active active not conatins in search bar then add this data
                    chatBox.innerHTML = data;
                    if(!chatBox.classList.contains("active")){ // if active class not contained in chatbox then scroll to bottom 
                        scrollToBottom();
                    }
                // }
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form);  //creating new formData Object
    xhr.send(formData); //sending the form data to php
    }, 500); //this function will run frequently after 500ms

    function scrollToBottom(){
        chatBox.scrollTop =chatBox.scrollHeight;
    }