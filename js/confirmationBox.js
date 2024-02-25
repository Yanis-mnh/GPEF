function showConfirmation(id) {

  const confirmationBox = document.getElementById('confirmation');
  confirmationBox.style.display = 'flex';
  show('#confirmation');
  const yesButton = document.getElementById('yes');
  const noButton = document.getElementById('no');

  let CanDelete = true;
  if(CanDelete == true)
  {    
    yesButton.addEventListener('click', function() {
    window.location.href = "php/delete.php?id="+id;
    });
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && CanDelete === true) {
            window.location.href = "php/delete.php?id="+id;
        }
      });

    noButton.addEventListener('click', function() {
      unShow('#confirmation');
      CanDelete = false;
    });
  }
}