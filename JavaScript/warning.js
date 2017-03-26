$('.warning input[type=button]').click( function () {
    $('.warning').empty();
    var confirmBtn = '';
    confirmBtn += '<label>Are You sure you want to Delete this item?</label>';
    confirmBtn += '<input type="submit" name="remove" value="Confirm">';
    $('.warning').append(confirmBtn);
})