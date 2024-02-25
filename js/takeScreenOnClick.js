let fullscreen = false
const btn = document.getElementsByClassName("BTN");
const body = document.body;
const fieldset = document.getElementsByClassName('fieldsetTab');
function takeScreen(id,i){

    if(fullscreen == false)
    {
        let divPrin = document.getElementById(id)
        divPrin.scrollIntoView({behavior: 'smooth'}, true);
        fieldset[i].style.width= "95%"
        fieldset[i].style.height= "100%"
        fieldset[i].style.marginBottom = "10px"
        fieldset[i].style.zIndex = "1"
        fieldset[i].style.boxShadow = "1px 1px 100px 100px black"
        fieldset[i].style.backgroundColor= 'var(--tabColrFS)';
        fieldset[i].style.transition= "all 1s"
        btn[i].style.backgroundImage = "url(../img/icons/close.png)"
        body.style.overflow = "hidden";

        fullscreen = true
    }
    else{
        fieldset[i].style.width= "80%"
        fieldset[i].style.height= "80%"
        fieldset[i].style.zIndex = "0"
        fieldset[i].style.transition= "all 1s"
        fieldset[i].style.boxShadow = "1px 1px 10px 1px black"
        fieldset[i].style.backgroundColor= 'var(--tabColr)';
        btn[i].style.backgroundImage = "url(../img/icons/fullscreen.png)"
        body.style.overflow = "auto"

        fullscreen = false
    }
}