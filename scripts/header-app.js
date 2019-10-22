var btnLogin = document.getElementById('btn-login');
var menuLogin = document.querySelector(".menu-login");

btnLogin.addEventListener("mouseover", (e)=>{
    e.preventDefault();
    menuLogin.classList.add('active') 
    
})

menuLogin.addEventListener("mouseleave", ()=>{
    menuLogin.classList.remove('active') 
})