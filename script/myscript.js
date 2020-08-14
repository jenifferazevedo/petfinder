var root = document.documentElement;
root.className += ' js';

function showCollapse(id, idButton) {
  let element = document.getElementById(id);
  let buttonId = document.getElementById(idButton);
  if (element.style.height === 'auto') {
    element.removeAttribute("style");
    buttonId.innerHTML = '<i class="fa fa-plus" aria-hidden="true"></i>'
  }
  else {
    element.style.height = 'auto';
    buttonId.innerHTML = '<i class="fa fa-minus" aria-hidden="true"></i>'
  }
}

function boxTop(idBox) {
  var boxOffset = $(idBox).offset().top;
  return boxOffset;
}

$(document).ready(function () {
  var $target = $('.leftScroll'),
    animationClass = 'fading-left',
    windowHeight = $(window).height(),
    offset = windowHeight - (windowHeight / 4);

  function animeScroll() {
    var documentTop = $(document).scrollTop();
    $target.each(function () {
      if (documentTop > boxTop(this) - offset) $(this).addClass(animationClass);
    });
  }
  animeScroll();

  $(document).scroll(function () {
    animeScroll();
  });
});

$(document).ready(function () {
  var $target = $('.rightScroll'),
    animationClass = 'fading-right',
    windowHeight = $(window).height(),
    offset = windowHeight - (windowHeight / 4);

  function animeScroll() {
    var documentTop = $(document).scrollTop();
    $target.each(function () {
      if (documentTop > boxTop(this) - offset) $(this).addClass(animationClass);
    });
  }
  animeScroll();

  $(document).scroll(function () {
    animeScroll();
  });
});


$(document).ready(function () {
  var $target = $('.fadingScroll'),
    animationClass = 'fading',
    windowHeight = $(window).height(),
    offset = windowHeight - (windowHeight / 4);

  function animeScroll() {
    var documentTop = $(document).scrollTop();
    $target.each(function () {
      if (documentTop > boxTop(this) - offset) $(this).addClass(animationClass);
    });
  }
  animeScroll();

  $(document).scroll(function () {
    animeScroll();
  });
});