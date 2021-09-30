window.addEventListener("scroll", function () {
  let nav = document.getElementById("banner");
  let blink = this.document.getElementById('banner-more');
  if (window.pageYOffset > 0) {
    nav.classList.add("is-sticky");
    blink.classList.add('hidden');
  } else {
    nav.classList.remove("is-sticky");
    blink.classList.remove('hidden');
  }
});
