(function ($) {
  const init = () => {
    console.log("A2nt\\\\ImageHotspot\\\\ImageHotspotField : init");

    const field = document.querySelector(".field--image-hotspot");

    const img = field.querySelector("img");
    const pin = field.querySelector(".pin");

    const fieldX = document.querySelector('[name="HotspotImageX"]');
    const fieldY = document.querySelector('[name="HotspotImageY"]');

    pin.style.left = fieldX.value + "%";
    pin.style.top = fieldY.value + "%";

    img.addEventListener("click", (e) => {
      const imgW = img.width;
      const imgH = img.height;

      const X = (e.offsetX * 100) / imgW;
      const Y = (e.offsetY * 100) / imgH;

      fieldX.value = X;
      fieldY.value = Y;
      pin.style.left = X + "%";
      pin.style.top = Y + "%";
    });
  };

  $.entwine("ss", ($) => {
    $(".field--image-hotspot").entwine({
      onmatch() {
        init();
      },
    });
  });
})(jQuery);
