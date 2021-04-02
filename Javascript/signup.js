const form = document.querySelector(".signup form"),
continuebtn = form.querySelector(".button input"),
errorTxt = form.querySelector(".error-txt");


form.onsubmit = (e) =>{
    e.preventDefault();
}

continuebtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
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