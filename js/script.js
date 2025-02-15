// Declaración de constantes
// Estas constantes almacenan las referencias a elementos del DOM que se utilizarán 

const btnSignIn = document.getElementById("sign-in"),
      btnSignUp = document.getElementById("sign-up"),
      containerFormRegister = document.querySelector(".register"),
      containerFormLogin = document.querySelector(".login");


// Evento click en btnSignIn
// añade la clase "hide" al contenedor de registro, ocultannndolo y mostrandolo
btnSignIn.addEventListener("click", e => {
    containerFormRegister.classList.add("hide");
    containerFormLogin.classList.remove("hide")
})



// Evento click en btnSignUp
// añade la clase "hide" al contenedor de registro, ocultandolo y mostrandolo
btnSignUp.addEventListener("click", e => {
    containerFormLogin.classList.add("hide");
    containerFormRegister.classList.remove("hide")
})




