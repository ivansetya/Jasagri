const email = document.getElementById("email");
const password = document.getElementById("password");
const form = document.getElementById("form_login");
const errorElement = document.getElementById("error");

form.addEventListener("submit", (e) => 
{
    validlogin(e);
})

function validlogin(currentEvent)
{
    let warning;
    let inputs = [
        password,
        email,
    ];
    for(var i = 0; i < inputs.length; i++)
    {
        if(inputs[i].value == "" || inputs[i].value == null)
        {
            warning = inputs[i].getAttribute("name") + " " + "tidak boleh kosong";
        }
    }

    if(warning != null)
    {
        currentEvent.preventDefault();
        errorElement.innerText = warning;
    }
    else
    {
        currentEvent.preventDefault();

        alert('Berhasil Daftar!')
        window.location.href = "homepage.html";
    }
}