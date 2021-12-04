const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{ 
        searchBar.classList.remove("active");
        searchBar.value = "";
    }



    // Start Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
xhr.open("POST", "php/search.php", true); // use get since we want to recieve data not to send
xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            // console.log("reached here");
            usersList.innerHTML = data;
        }
    }
}
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
// Start Ajax
let xhr = new XMLHttpRequest(); //creating XML object
xhr.open("GET", "php/users.php", true); // use get since we want to recieve data not to send
xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        // console.log("reached here1");
        if(xhr.status === 200){
            let data = xhr.response;
            // console.log("reached here2");
            // console.log(data);
            if(!searchBar.classList.contains("active")){ //if active active not conatins in search bar then add this data
                usersList.innerHTML = data;
            }
        }
    }
}
xhr.send();
}, 500); //this function will run frequently after 500ms
