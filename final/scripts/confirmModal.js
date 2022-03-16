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
    if(bodyBefore.classList.contains('show-before')){
      document.documentElement.style.setProperty('--opacity', "1");
      console.log('opacity changed to 1');
    }
    disableScroll();
    console.log('Showing Modal');
  }
})

// On page reload, the url contains the string of "update=success", have the modal pop up
if (window.location.href.indexOf("update=success") != -1) {
  confirmModal.classList.add('modal-active');
  if (confirmModal.classList.contains('modal-active')) {
    bodyBefore.classList.add('show-before');
    confirmModal.classList.add('bottom-zero');
    if(bodyBefore.classList.contains('show-before')){
      document.documentElement.style.setProperty('--opacity', "1");
      console.log('opacity changed to 1');
    }
    // Be at bottom of page
    window.scroll(0, document.documentElement.scrollHeight)
    disableScroll();
    console.log('Showing Modal');
  }
}