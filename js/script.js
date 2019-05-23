(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 100
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

})(jQuery); // End of use strict

// Hides top bar when "play" is clicked.
function barHide() {
  let navBar = document.getElementById("mainNav");
  navBar.style.display = 'none';
}


function goToTeam() {
  let navBar = document.getElementById("team");
  navBar.style.display = 'block';
}

// Restores the top bar when a user scrolls up.
var position = $(window).scrollTop();
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll < position) {
    $("#mainNav").css("display", "unset");
    
  }
  position = scroll;
});

// Properly scrolls a user down to the Unity pane when "play" is clicked
$("#play").click(function() {
    $("#unityContainer").css("display", "block");
let unityPane = $("#unityContainer");
$('html,body').animate({scrollTop: unityPane.offset().top},'slow');
});

$("#playbutton").click(function() {
    $("#unityContainer").css("display", "block");
let unityPane = $("#unityContainer");
$('html,body').animate({scrollTop: unityPane.offset().top},'slow');
});

$("#ourteam").click(function() {
    $("#team").css("display", "block");
let unityPane = $("#team");
$('html,body').animate({scrollTop: unityPane.offset().top},'slow');
});
