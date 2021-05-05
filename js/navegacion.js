navegacion = document.getElementById("navegacion"),
menuNavegacion = document.getElementById("menuNavegacion"), contador=0;

menuNavegacion.addEventListener('click', abreCierra,true);

function abreCierra(){
    if(contador==0){
       navegacion.classList.add('active'); 
       contador=1;
    }else{
        navegacion.classList.remove('active');
        contador=0;
    }
    
}

