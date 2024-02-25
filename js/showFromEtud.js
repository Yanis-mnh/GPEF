window.addEventListener('load', () => {
    const etudRadio = document.querySelector('input[name="type"][value="etud"]');
    const etudDiv = document.querySelector('.etud');
    const etudInputs = document.querySelectorAll('.etud input');
    
    etudRadio.addEventListener('change', () => {
      if (etudRadio.checked) {
        etudDiv.style.display = 'flex';
        etudDiv.classList.remove('unshowEtudDiv');
        etudDiv.classList.add('showEtudDiv');
        etudInputs.forEach(input => {
          input.setAttribute('required',true);
        });
      } 
    });
  
    const ensRadio = document.querySelector('input[name="type"][value="ens"]');

    function unshowEtudDiv(){
      const div = document.querySelector('.showEtudDiv');
      etudDiv.classList.remove('showEtudDiv');
      etudDiv.classList.add('unshowEtudDiv');
      function removeDiv() {
          etudDiv.style.display = 'none';
          etudDiv.classList.remove("unshowEtudDiv");
          div.removeEventListener('animationend', removeDiv);
          delete div;

          etudInputs.forEach(input => {
            input.removeAttribute('required');
          });
      }
      div.addEventListener('animationend', removeDiv);
    }
    ensRadio.addEventListener('change', () => {
        if (ensRadio.checked) {
          unshowEtudDiv();
        }
    });
    const reset = document.getElementById('reset');
    reset.addEventListener('click',()=>{unshowEtudDiv();})

  });
  