function zoomIn () {
  alert("Zoom In");
}

$(document).ready(function () {
  $('#linkIncrease').click(function() {modifyFontSize('Increase'); });
  $('#linkDecrease').click(function() {modifyFontSize('Decrease'); });
  $('#linkReset').click(function() {modifyFontSize('Reset'); })

  function modifyFontSize (flag) {
    var divElement = $('#divContent');
    var currentFontSize = parseInt(main.css('font-size'));

    if (flag == 'Increase')
        currentFontSize += 3;
    else if (flag == 'Decrease')
        currentFontSize -= 3;
    else
        currentFontSize = 16;
    main.css('font-size', currentFontSize);
  }
});
