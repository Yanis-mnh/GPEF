window.addEventListener('load',()=>{
    const elt = document.querySelector('nav');
    const dropMenu = document.querySelector('#dropMenu');
    elt.style.transition = 'all .25s ease-in-out';
    let mouseIN = false;
    let mouseInDropMenu = false;
    if(dropMenu)
    {
        this.window.scrollY = 10;
        dropMenu.addEventListener('mouseenter',()=>
        {
            mouseInDropMenu = true;
        });
        dropMenu.addEventListener('mouseleave',()=>
        {
            mouseInDropMenu = false;
        });
    }
    addEventListener('scroll' ,function(){
        
        if(mouseInDropMenu === false )
        {
            if( this.window.scrollY == 0 )
            {
                elt.style.opacity = '1';
                elt.style.transform = 'translate(-50%,0px)';
                elt.style.boxShadow = '1px 1px 10px black';
            }
            else if(this.window.scrollY != 0 && window.scrollY < 5 && mouseIN == false)
            {
                elt.style.opacity = '.7';
                elt.style.transform = 'translate(-50%,-55px)';
                elt.style.boxShadow = 'none';
                
            }
        }
        console.log('mousein: '+ parseInt(mouseIN)+'scrollY: '+this.window.scrollY)
    })  
    addEventListener('mousemove', function(e){
        posNav = elt.getBoundingClientRect();
        if( this.window.scrollY != 0 && mouseInDropMenu === false)
                //enter the nav
                if( (posNav.height+5) > e.clientY )
                {
                    mouseIN = true;
                    elt.style.opacity = '1';
                    elt.style.transform = 'translate(-50%,0px)';
                    elt.style.boxShadow = '1px 1px 10px black';
                }
                //get out of the nav
                else if( ((posNav.height) < e.clientY) ){
                    mouseIN=false;
                    elt.style.opacity = '.7';
                    elt.style.transform = 'translate(-50%,-55px)';
                    elt.style.boxShadow = 'none';
                }
    });

});
