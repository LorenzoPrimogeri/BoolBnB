

function SelezTT()
{
    event.preventDefault();
    let i = 0;
    let checked = false;
    const modulo = document.modulo.elements;

    for (i=0; i<modulo.length; i++)
    {
        if(modulo[i].type === "checkbox" && modulo[i].checked  )
        {
            checked = true;
        }
    }
    console.log(checked)
    if(!checked)
    {
        document.getElementById('checkdiv').innerHTML = "devi selezionare almeno un servizio!"
    } else {
        document.getElementById('checkdiv').innerHTML = " "
    }
}
