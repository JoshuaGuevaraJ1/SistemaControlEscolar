let cerrar = document.querySelectorAll(".cerrar")[0];
let abrir = document.querySelectorAll(".cta")[0];
let modal = document.querySelectorAll(".modal")[0];
let modalC = document.querySelectorAll(".modalContenedor")[0];

abrir.addEventListener("click", function(e){
    e.preventDefault();
    modalC.style.opacity ="1";
    modalC.style.visibility ="visible";
    modal.classList.toggle("modalCerrar");
});

cerrar.addEventListener("click", function(){
    modal.classList.toggle("modalCerrar");
    setTimeout(function(){
        modalC.style.opacity ="0";
        modalC.style.visibility ="hidden";
    },500)
})

let cerrar2 = document.querySelectorAll(".cerrar2")[0];
let abrir2 = document.querySelectorAll(".cta2")[0];
let modal2 = document.querySelectorAll(".modal2")[0];
let modalC2 = document.querySelectorAll(".modalContenedor2")[0];

abrir2.addEventListener("click", function(e){
    e.preventDefault();
    modalC2.style.opacity ="1";
    modalC2.style.visibility ="visible";
    modal2.classList.toggle("modalCerrar2");
});

cerrar2.addEventListener("click", function(){
    modal2.classList.toggle("modalCerrar2");
    setTimeout(function(){
        modalC2.style.opacity ="0";
        modalC2.style.visibility ="hidden";
    },500)
})