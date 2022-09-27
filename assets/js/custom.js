(function ($) {
  $(document).ready(function () {
    
    $('#nav-icon1').click(function() {
        $(this).toggleClass('open');
        $('.menu').slideToggle();
    });

      $('.testimonial_txt').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        fade: true,
      }); 

      $('.advocates_list').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 577,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      }); 


      $('.buy-ticket').click(function() {
        $('.buyNow_form').fadeIn();
      });

      $('.buyNow_form_in input[type="submit"]').click(function() {
        
        $('.buyNow_form_in').fadeOut();
        $('.thanks_txt').fadeIn();
      });

      $('.close').click(function() {
        $('.buyNow_form').fadeOut();
      });
         
          

    $(".galler_section .hide_show").slice(0,4).show();
    $("#seeMore").click(function(e){
      e.preventDefault();
      $(".hide_show:hidden").slice(0,2).fadeIn("slow");
      
      if($(".hide_show:hidden").length == 0){
        $("#seeMore").fadeOut("slow");
      }

    });
  });


  $(window).scroll(function() {
    if ($(this).scrollTop() > 35){  
        $('.header').addClass("sticky");
        $('.top_rainbow').addClass("sticky");
      }
      else{
        $('.header').removeClass("sticky");
        $('.top_rainbow').removeClass("sticky");
      }
    });

   

})(jQuery);

$(function(){
  $("header").load("assets/includes/header.html"); 
  $("footer").load("assets/includes/footer.html"); 

  setTimeout(() => {
    var CurrentUrl= document.URL;
    var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
    console.log(CurrentUrlEnd);
    $( ".menu li a" ).each(function() {
          console.log('HI')
          var ThisUrl = $(this).attr('href');
          var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();
          console.log(ThisUrlEnd)
          if(ThisUrlEnd == CurrentUrlEnd){
          $(this).closest('li').addClass('active')
          }
    });
  }, 800);
});
