function search() {
    var searchValue = $("#wineSearch").val();
    $.get("getWineByNameService.php?value=" + searchValue, searchCallBack);
}

function searchCallBack(result) {
    $('.searchResults').empty();
    var newItem = $(".searchResults");
    $(newItem).append("<h3>Search Results</h3>");
    for (var i = 0; i < result.length; i++) {
        $(newItem).append("<p><a href='wine.php?iCode=one&id=" +  result[i].wine_id + "'>" + result[i].wine_name + "</a></p>");
        $('.searchResults #results').append(newItem);
    }
    $('.searchResults').toggleClass('showSearchResults');
}