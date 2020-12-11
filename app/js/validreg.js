const namalengkap = document.getElementById("fullname");
const email = document.getElementById("email");
const alamat = document.getElementById("alamat");
const password = document.getElementById("daftarPassword");
const validpass = document.getElementById("validpass");
const form = document.getElementById("form_registration");
const errorElement = document.getElementById("error");

form.addEventListener("submit", (e) => 
{
    validreg(e);
})

function validreg(currentEvent)
{
    let warning;
    let inputs = [
        validpass,
        password,
        alamat,
        email,
        namalengkap
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
        window.location.href = "login.html";
    }
}