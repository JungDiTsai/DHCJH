$('.owl-carousel').owlCarousel({
  loop:true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  margin:30,
  items: 1,
  dots: false,
  autoplay: true,
  autoHeight:true,
  autoplayHoverPause: true,
  nav:false,
  autoplayTimeout: 1000,
  // center:true,
  responsive:{
      0:{
          items:3
      },
      600:{
          items:5
      },
      1000:{
          items:7
      }
  }
})