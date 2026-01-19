let imgSlider = document.getElementsByClassName("imgSlide");
let compteur = 0;

function enleverActive(){
    for(i=0; i<=imgSlider.length-1; i++){
        imgSlider[i].classList.remove("active");
    }
}

setInterval(()=>{
    enleverActive();
    compteur++;
    if(compteur+1 > imgSlider.length){
        compteur=0;
    }
    imgSlider[compteur].classList.add("active");
}, 3000)



 






