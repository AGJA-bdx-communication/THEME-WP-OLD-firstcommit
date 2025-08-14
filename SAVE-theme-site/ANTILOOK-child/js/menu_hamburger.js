var $ =jQuery.noConflict();

$(document).ready(function () {

  $('.first-button').on('click', function () {

    $('.animated-icon1').toggleClass('open');
  });
  $('.second-button').on('click', function () {

    $('.animated-icon2').toggleClass('open');
  });
  $('.third-button').on('click', function () {

    $('.animated-icon3').toggleClass('open');
  });
});



$(document).ready(function() {

  /* ================= */
  /* MENU
  /* ================= */
  var menuComplet = $(".menu-complet");  
  var menu = $(".menu");
  var hamburger = $(".hamburger");
  var menuOpen;

  function openMenu(){
    menu.css("left", "0px");
    menuOpen = true;
  }
  function closeMenu(){
    menu.css("left", "-450px");
    menuOpen = false;
  }
  function toggleMenu(){
    hamburger.toggleClass("active");
    if (menuOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  }
  hamburger.on({
    click: function(){
      toggleMenu();
    }
  });
  /*
  hamburger.on({
    mouseenter: function(){
      openMenu();
    }
  });
  */
  menuComplet.on({
    mouseleave: function(){
      if(menuOpen){
        toggleMenu();
        closeMenu();
      }
    }
  });

  /* ================= */
  /* RECHERCHE
  /* ================= */
  var boutonRecherche = $(".bouton-recherche");
  var barreRecherche = $(".bar-recherche");
  var barreMobile = $(".bar-mobile");
  var rechercheOpen;
  var rechercheClose;

  function openRecherche(){
    barreRecherche.css("top", "110px");
    barreMobile.css("top", "140px");
    rechercheOpen = true;
  }
  function closeRecherche(){
    barreRecherche.css("top", "-450px");
    barreMobile.css("top", "-450px");
    rechercheOpen = false;
  }
  function toggleRecherche(){
    boutonRecherche.toggleClass("active");
    if (rechercheOpen) {
      closeRecherche();
    } else {
      openRecherche();
    }
  }
  boutonRecherche.on({
    click: function(){
      toggleRecherche();
    }
  });

  /* FERMETURE EN SORTANT DE LA DIV 
  barreRecherche.on({
    mouseleave: function(){
      if(rechercheOpen){
        toggleRecherche();
        closeRecherche();
      }
    }
  });
  */

  // boutonMobile.on({
  //  click: function(){
  //    toggleRecherche();
  //  }
  // });

});



$(document).ready(function() {

  function toggleSidebar() {
    $(".button").toggleClass("active");
    $("main").toggleClass("move-to-left");
    $(".sidebar-item").toggleClass("active");
  }

  $(".button").on("click tap", function() {
    toggleSidebar();
  });

  $(document).keyup(function(e) {
    if (e.keyCode === 27) {
      toggleSidebar();
    }
  });

});


