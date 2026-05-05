const inputEmail            = document.querySelector("#email");
const inputPassword         = document.querySelector("#password");
const spanEmail             = document.querySelector("#spanEmail");
const spanPassword          = document.querySelector("#spanPassword");
const iconEmail             = document.querySelector("#iconEmail");
const iconPassword          = document.querySelector(".iconPassword");
const iconVisiblePassword   = document.querySelector("#iconVisiblePassword");
const iconInvisiblePassword = document.querySelector("#iconInvisiblePassword");
const msgErrorEmail         = document.querySelector("#msgErrorEmail");
const msgErrorPassword      = document.querySelector("#msgErrorPassword");
const inputSave             = document.querySelector("#save");
const btnLogin              = document.querySelector("#btnLogin");
const csrf                  = document.querySelector("#csrf");

btnLogin.addEventListener("click", async (event) => {
    event.preventDefault();

    if(inputEmail.value == "") {
        emailInvalid("Preencha o campo corretamente com o e-mail");
    }

    if(inputPassword.value == "") {
        passwordInvalid("Preencha o campo corretamente com uma senha");
    }

    if(inputEmail.value != '' && inputPassword.value != '') {
        
        try {

            const data = await callApi(inputEmail.value, inputPassword.value, csrf.value);
            
            if(data.status = 200 && data.login) {
                window.location.href = "/home";
            }
            
        } catch(error) {
            emailInvalid("E-mail invalido");
            passwordInvalid("Senha inválida");
            console.log(error);
        }

    }

});

spanPassword.addEventListener("click", (event) => {
    passwordVisibility();
    passwordIconVisibility();
});

function emailInvalid(message)
{
    msgErrorEmail.classList.toggle("d-none");
    spanEmail.classList.toggle("border-danger");
    spanEmail.classList.toggle("text-danger");
    inputEmail.classList.toggle("border-danger");
    inputEmail.classList.toggle("is-invalid");
    msgErrorEmail.innerText = message;

    setTimeout(() => {
        msgErrorEmail.classList.toggle("d-none");
        spanEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("text-danger");
        inputEmail.classList.toggle("border-danger");
        inputEmail.classList.toggle("is-invalid");
    }, 3000);
}

function passwordInvalid(message)
{
    msgErrorPassword.classList.toggle("d-none");
    spanPassword.classList.toggle("border-danger");
    spanPassword.classList.toggle("text-danger");
    inputPassword.classList.toggle("border-danger");
    inputPassword.classList.toggle("is-invalid");
    msgErrorPassword.innerText = message;
            
    setTimeout(() => {
        msgErrorPassword.classList.toggle("d-none");
        spanPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("text-danger");
        inputPassword.classList.toggle("border-danger");
        inputPassword.classList.toggle("is-invalid");
    }, 3000);
}

async function callApi(email, password, csrf)
{
    const response = await fetch("/api/login", 
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(
                { 
                    email   : email,
                    password: password,
                    csrf    : csrf
                }
            ),            
        }
    );
        
    const data = await response.json();

    if(data.status != 200) {
        throw new Error(`Error na requisição, status: ${data.status} ${data.message}`);
    }

    return data;
}

function passwordVisibility()
{
    let visibility     = inputPassword.type == "password" ? true : false;
    visibility         = visibility ? "text" : "password";
    inputPassword.type = visibility;
}

function passwordIconVisibility()
{
    iconVisiblePassword.classList.toggle("d-none"); 
    iconInvisiblePassword.classList.toggle("d-none");
}
