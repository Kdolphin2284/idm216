// Vertical Sliding Modals

let modalButton = document.getElementById('modal-button');
let confirmModal = document.getElementById('confirm-modal');
let bodyBefore = document.getElementById('modal-before');
let cancelModal = document.getElementById('cancel-button');

modalButton.addEventListener("click", function(){
  confirmModal.classList.add('modal-active');
  if (confirmModal.classList.contains('modal-active')) {
    bodyBefore.classList.add('show-before');
    confirmModal.classList.add('bottom-zero');
    disableScroll();
    console.log('Showing Modal');
  }
})

// Close Sliding Modal

cancelModal.addEventListener("click", function(){
    if(confirmModal.classList.contains('modal-active')) {
      confirmModal.classList.remove('modal-active');
      bodyBefore.classList.remove('show-before');
      confirmModal.classList.remove('bottom-zero');
      enableScroll();
      console.log('Closed confirmation modal');
    }
  })