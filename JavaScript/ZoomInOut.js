function zoomIn () {
  alert("Zoom In");
}

<<<<<<< HEAD
$(document).ready(function ()) {
  $('#linkIncrease').click(function() { modifyFontSize('Increase'); });
  $('#linkDecrease').click(function() { modifyFontSize('Decrease');});
  $('#linkReset').click(function() { modifyFontSize('Reset');});
=======
$(document).ready(function () {
  $('#linkIncrease').click(function() {modifyFontSize('Increase'); });
  $('#linkDecrease').click(function() {modifyFontSize('Decrease'); });
  $('#linkReset').click(function() {modifyFontSize('Reset'); })
>>>>>>> origin/master

  function modifyFontSize (flag) {
    var divElement.css = $('.divContent');
    var currentFontSize = parseInt(divElement.css('font-size'));

    if (flag == 'Increase')
        currentFontSize += 3;
    else if (flag == 'Decrease')
        currentFontSize -= 3;
    else
        currentFontSize = 16;
    divElement.css('font-size', currentFontSize);
  }
});
