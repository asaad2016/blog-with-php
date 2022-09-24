/* global $,console,alert */
/*start header*/
$(function (){
$(".header").height($(window).height());
    $(window).resize(function (){
        $(".header").height($(window).height());
        
    });
    $(".links li a").click(function(){
        $(this).parent().addClass("active").siblings().removeClass("active");
        
    });
     $('.bxslider').bxSlider();
    

//smooth scroll to div 
    /*$(".ser").click(function (){
       
        $("html,body").animate({
    scrollTop: $("#services").offset().top;
    },1000);
    }));*/
 $(".links li a").click(function (){
  $("html,body").animate({
    scrollTop: $("#" + $(this).data('value')).offset().top
    },2000);
 });
 
});