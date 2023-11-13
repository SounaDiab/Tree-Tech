// Header
$(document).ready(function () {
   $(".categories").click(function () {
      $(".category").slideToggle("slow");
   });

   $(".toggle-menu").click(function () {
      $(".toggle-menu").toggleClass("menu-active");
      $(".ul").slideToggle("slow").css("display","flex");
   });

   $(".form, .gallery, .about, .contact, .to, .landing, .internet, .accessories, .phone, .laptop").click(function () {
      if(window.innerWidth <= 991){
         $(".ul").slideUp("slow");
      }
      $(".category").slideUp("fast");
      $(".toggle-menu").removeClass("menu-active");
   });

   // Prevent Default
   $(`#prev, #next, .toggle-menu, .prev ,.next, #next-accessories,
      #prev-accessories, #next-phone, #prev-phone, #next-laptop, 
      #prev-laptop`).on("click",function(e){
      e.preventDefault();
   });

   // Stop Propagation
   $(".toggle-menu ,.ul,.category").on("click",function(e){
      e.stopPropagation();
   });
});

// Gallery

document.querySelector('#next').onclick = function () {
   let lists = document.querySelectorAll('.item');
   document.querySelector('.slide').appendChild(lists[0]);
}
document.querySelector('#prev').onclick = function () {
   let lists = document.querySelectorAll('.item');
   document.querySelector('.slide').prepend(lists[lists.length - 1]);
}

// accessories

document.querySelector('#next-accessories').onclick = function () {
   let listsA = document.querySelectorAll('.card-accessories');
   document.querySelector('.child-accessories').appendChild(listsA[0]);
}
document.querySelector('#prev-accessories').onclick = function () {
   let listsA = document.querySelectorAll('.card-accessories');
   document.querySelector('.child-accessories').prepend(listsA[listsA.length - 1]);
}

// phone

document.querySelector('#next-phone').onclick = function () {
   let listsP = document.querySelectorAll('.card-phone');
   document.querySelector('.child-phone').appendChild(listsP[0]);
}
document.querySelector('#prev-phone').onclick = function () {
   let listsP = document.querySelectorAll('.card-phone');
   document.querySelector('.child-phone').prepend(listsP[listsP.length - 1]);
}

// laptop

document.querySelector('#next-laptop').onclick = function () {
   let listsL = document.querySelectorAll('.card-laptop');
   document.querySelector('.child-laptop').appendChild(listsL[0]);
}
document.querySelector('#prev-laptop').onclick = function () {
   let listsL = document.querySelectorAll('.card-laptop');
   document.querySelector('.child-laptop').prepend(listsL[listsL.length - 1]);
}

//! ////////////////////////////////////////////////////////////////////////////