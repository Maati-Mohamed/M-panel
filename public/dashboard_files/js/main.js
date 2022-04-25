const themeTogglor = document.querySelector(".theme-toggler");
const menuBtn = document.querySelector(".menu-icon");
const sideMenu = document.querySelector("aside");
const closeBtn = document.querySelector("#close-btn");


// show sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})
// hide sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// theme toggler
themeTogglor.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variable');

    themeTogglor.querySelector('i:nth-child(1)').classList.toggle('active');
    themeTogglor.querySelector('i:nth-child(2)').classList.toggle('active');
});




// // Modal
// var exampleModal = document.getElementById('exampleModal')
// exampleModal.addEventListener('show.bs.modal', function (event) {
//   // Button that triggered the modal
//   var button = event.relatedTarget
//   // Extract info from data-bs-* attributes
//   var userId = button.getAttribute('data-bs-userId')
//   // If necessary, you could initiate an AJAX request here
//   // and then do the updating in a callback.
//   //
//   // Update the modal's content.
//   var modalBodyInput = exampleModal.querySelector('.modal-body input#id')

//   modalBodyInput.value = userId
// })
