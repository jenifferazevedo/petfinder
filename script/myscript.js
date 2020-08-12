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