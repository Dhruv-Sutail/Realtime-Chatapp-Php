const searchbar = document.querySelector(".users .search input"),
searchbtn = document.querySelector(".users .search button"),
userlist = document.querySelector(".users .user-list");

searchbtn.onclick = () =>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
    searchbar.value="";
}

searchbar.onkeyup = ()=>{
    let searchterm = searchbar.value;
    if(searchterm != ""){
        searchbar.classList.add("active");
    }else{
        searchbar.classList.remove("active");
    }
    if(searchterm!=""){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","php/search.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    userlist.innerHTML=data;
                }
            }   
        }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");    
    xhr.send("searchterm="+searchterm);
    }
}


 setInterval(() =>{

   let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchbar.classList.contains("active")){
                    userlist.innerHTML=data;
                }
            }
        }
    }
    xhr.send();
 },500);