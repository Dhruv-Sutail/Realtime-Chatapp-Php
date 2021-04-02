const form = document.querySelector(".login form"),
continuebtn = form.querySelector(".button input"),
errorTxt = form.querySelector(".error-txt");


form.onsubmit = (e) =>{
    e.preventDefault();
}

continuebtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login_js.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data=="success!!"){
                    location.href = "user.php";
                }
                else{
                    errorTxt.textContent = data;
                    errorTxt.style.display = 'block';
                    
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}