document.addEventListener('DOMContentLoaded',()=>{
    eventListeners();
    darkMode();
})
function eventListeners(){
    const mobmenu= document.querySelector('.mobile__img');
    mobmenu.addEventListener('click',navResponsive);
    //Mostrando campos de forma condicional
    const contacto= document.querySelectorAll('input[name="contacto[contacto]"]');
    contacto.forEach(input =>   input.addEventListener('click',mostrarMetodos));
}
function mostrarMetodos(e){
    const divcontacto= document.querySelector('#contacto');
   if(e.target.value==="telefono"){
       divcontacto.innerHTML=`
       <label for="tel">Número</label>
       <input data-cy="input-telefono" type="tel" placeholder="Ej. +52 12-34-56-78" id="tel" name="contacto[telefono]" required>
       <p>Elija la fecha y la hora</p>
       <label for="fecha"> Fecha</label>
       <input data-cy="input-fecha" type="date" name="contacto[fecha]" id="fecha" required>
       <label for="hora"> Hora</label>
       <input data-cy="input-hora" type="time" name="contacto[hora]" id="hora" min="09:00" max="21:00" required>

       `;
   }else{
    divcontacto.innerHTML=`<label for="email"> Email</label>
    <input data-cy="input-email" type="email" placeholder="Ej. correo@correo.com" id="email" name="contacto[email]" required>`;
   }
}
function navResponsive() {
    const nav= document.querySelector('.navegacion');
    nav.classList.toggle('mostrar');
}
function darkMode() {
    const preferencias= window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(preferencias.matches); esto te deja ver si el usuario prefiere una version dark de una web o no
    if (preferencias.matches) {
        document.body.classList.add('darkmode-action');
    }else{
        document.body.classList.remove('darkmode-action');
    }
    preferencias.addEventListener('change', ()=>{
        if (preferencias.matches) {
            document.body.classList.add('darkmode-action');
        }else{
            document.body.classList.remove('darkmode-action');
        }
    })
    const btn_dark= document.querySelector('.darkmode');
    btn_dark.addEventListener('click', ()=>{
        document.body.classList.toggle('darkmode-action');
    })
}