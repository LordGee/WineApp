$('#categoryU').change(function () {
    $('.categoryU').empty();
    var value = $('#categoryU option:selected').text();
    if (value == "Red Wine" || value == "White Wine") {
        var addNewSelectBox = "";
        addNewSelectBox += '<br><br>' + "\n";
        addNewSelectBox += '<label for="levelU">Level Indicator : </label>' + "\n";
        addNewSelectBox += '<select name="lvl" id="levelU">' + "\n";
        addNewSelectBox += '<option name="lvl" value="" disabled selected>Select the level indicator</option>' + "\n";
        if (value == "White Wine") {
            addNewSelectBox += '<option name="lvl" value="Dry Wine" >Dry Wine</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Sweet Wine" >Sweet Wine</option>' + "\n";
        } else {
            addNewSelectBox += '<option name="lvl" value="Light Bodied Wine" >Light Bodied</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Full Bodied Wine" >Full Bodied</option>' + "\n";
        }
        addNewSelectBox += '</select>' + "\n";
        $('.categoryU').append(addNewSelectBox);
    }
});

$(document).ready(function() {
    $('.categoryU').empty();
    var value = $('#categoryU option:selected').text();
    if (value == "Red Wine" || value == "White Wine") {
        var addNewSelectBox = "";
        addNewSelectBox += '<br><br>' + "\n";
        addNewSelectBox += '<label for="levelU">Level Indicator : </label>' + "\n";
        addNewSelectBox += '<select name="lvl" id="levelU">' + "\n";
        addNewSelectBox += '<option name="lvl" value="" disabled selected>Select the level indicator</option>' + "\n";
        if (value == "White Wine") {
            addNewSelectBox += '<option name="lvl" value="Dry Wine" >Dry Wine</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Sweet Wine" >Sweet Wine</option>' + "\n";
        } else {
            addNewSelectBox += '<option name="lvl" value="Light Bodied Wine" >Light Bodied</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Full Bodied Wine" >Full Bodied</option>' + "\n";
        }
        addNewSelectBox += '</select>' + "\n";
        $('.categoryU').append(addNewSelectBox);
    }
});

$('#category').change(function () {
    $('.category').empty();
    var value = $('#category option:selected').text();
    if (value == "Red Wine" || value == "White Wine") {
        var addNewSelectBox = "";
        addNewSelectBox += '<br><br>' + "\n";
        addNewSelectBox += '<label for="level">Level Indicator : </label>' + "\n";
        addNewSelectBox += '<select name="lvl" id="level">' + "\n";
        addNewSelectBox += '<option name="lvl" value="" disabled selected>Select the level indicator</option>' + "\n";
        if (value == "White Wine") {
            addNewSelectBox += '<option name="lvl" value="Dry Wine" >Dry Wine</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Sweet Wine" >Sweet Wine</option>' + "\n";
        } else {
            addNewSelectBox += '<option name="lvl" value="Light Bodied" >Light Bodied</option>' + "\n";
            addNewSelectBox += '<option name="lvl" value="Full Bodied" >Full Bodied</option>' + "\n";
        }
        addNewSelectBox += '</select>' + "\n";
        $('.category').append(addNewSelectBox);
    }
});