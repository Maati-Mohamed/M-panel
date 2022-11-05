
(function () {
    //===== Prealoder

    window.onload = function () {
        window.setTimeout(fadeout, 500);
    }

    function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
    }
    
})();

const listIcon = document.querySelector('#list-icon');
const sideBar = document.querySelector('.MyAside');
const Mynav = document.querySelector('.Mynav');
const navIcon = document.querySelector('#nav-icon');
const closeIcon = document.querySelector('.close-icon');
const main_content = document.querySelector('.main-content');



listIcon.addEventListener('click', function() {
    sideBar.classList.toggle('side-Hide');
    Mynav.classList.toggle('resize-width');
    main_content.classList.toggle('resize-main-content');
})
// show sidebar
navIcon.addEventListener('click', () => {
    sideBar.style.display = 'block';
})
// hide sidebar
closeIcon.addEventListener('click', () => {
    sideBar.style.display = 'none';
})

const myLinks = document.querySelectorAll('.aside-link')

for (var i = 0; i < myLinks.length; i++) {
    myLinks[i].addEventListener("click", function(e) {
        
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";

    });
  }

const logoutLink = document.querySelector('#logout-link');
const logoutForm = document.querySelector('#logout-form');

logoutLink.addEventListener("click", function(event) {
    event.preventDefault();
    let form = logoutForm;
    swal({
            title: 'Are you Want to logout ?',
            text: "",
            icon: "warning",
            buttons: true,
            dragerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});

// Modal
var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var userId = button.getAttribute('data-bs-userId')
  var modalBodyInput = exampleModal.querySelector('.modal-body input#id')

  modalBodyInput.value = userId
})
