const showHidePass = document.querySelectorAll('.bx-hide');
const links = document.querySelectorAll('.link');
const forms = document.querySelector(".forms");
showHidePass.forEach(showPass =>{
    showPass.addEventListener("click", ()=>{
        let passField = showPass.parentElement.querySelectorAll(".password");
        passField.forEach(pass => {
            if(pass.type == "password"){
                pass.type = "text";
                showPass.style.color = "#0D6EFD";
            }else{
                pass.type = "password";
                showPass.style.color = "#31291D";
            }
        })
    })
})
console.log("yes");