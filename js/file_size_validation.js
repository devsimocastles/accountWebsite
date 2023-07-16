// input file
const file = document.getElementById("file");
// form
const form = document.getElementById("form");
// submit button
const btn = document.getElementById("btn");
// ul msg container
const ulMsg = document.querySelector("ul.error")

// max file size
const MFS = 2000000;

file.addEventListener("change", (e) => {
    /*
        si el archivo seleccionado en el input
        es mayor a 2mb
    */
    if(e.target.files[0].size > MFS){
        /* desactiva el botón de submit
        y muestra el error en el contenedor
         ul.error */
        btn.disabled = true;
        ulMsg.innerHTML ="<li>El archivo debe ser menor a 2mb</li>";
    } else {
        btn.disabled = false;
        ulMsg.innerHTML = "";
    }
})