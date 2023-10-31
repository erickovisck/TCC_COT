if (window.matchMedia("(min-width:576px)").matches) {
  var $carousel = $('#carouselExample');
  var cardWidth = $('.carousel-item').width();
  var scrollPosition = 0;

  // Função para copiar os primeiros slides e anexá-los ao final
  function copyAndAppendSlides() {
    var $carouselInner = $carousel.find('.carousel-inner');
    var $firstSlides = $carouselInner.find('.carousel-item:lt(6)').clone();
    $carouselInner.append($firstSlides);
  }

  copyAndAppendSlides();

  $('.carousel-control-next').on('click', function () {
    var carouselWidth = $('.carousel-inner')[0].scrollWidth;
    if (scrollPosition < (carouselWidth - (cardWidth * 6))) {
      console.log('next');
      scrollPosition = scrollPosition + cardWidth;
      $('.carousel-inner').animate({ scrollLeft: scrollPosition }, 200);
    } else {
      // Se você chegou ao fim, volte para o início
      scrollPosition = 0;
      $('.carousel-inner').animate({ scrollLeft: scrollPosition }, 200, function () {
        copyAndAppendSlides();
      });
    }
  });

  $('.carousel-control-prev').on('click', function () {
    if (scrollPosition > 0) {
      console.log('prev');
      scrollPosition = scrollPosition - cardWidth;
      $('.carousel-inner').animate({ scrollLeft: scrollPosition }, 600);
    } else {
      // Se você está no início, vá para o fim
      var carouselWidth = $('.carousel-inner')[0].scrollWidth;
      scrollPosition = carouselWidth - (cardWidth * 4);
      $('.carousel-inner').animate({ scrollLeft: scrollPosition }, 600, function () {
        copyAndAppendSlides();
      });
    }
  });
} else {
  // Comportamento para telas menores (se necessário)
}
