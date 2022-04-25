require('./bootstrap');


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


Echo.private(`App.Models.User.1`)
    .notification(function (data){
        alert(data.body)
    }); 

