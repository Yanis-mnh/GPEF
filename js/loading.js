window.addEventListener('load',()=>{
    
    setTimeout(()=>{
        let loading = document.querySelector("#loading");   
        body.style.overflow = "visible";
        loading.classList.add("fadout");
        delete loading;
        let fadout = document.querySelector(".fadout");
        setTimeout(()=>{
            fadout.remove();
            delete loading;
        },400);
    } 
    ,100);
    
});

