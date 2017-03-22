function search() {
    var searchValue = $("#wineSearch").val();
    $.get("getWineByNameService.php?value=" + searchValue, searchCallBack);
}

function searchCallBack(result) {
    $('.searchResults').find("table").remove();
    var newTab = $("<table id='results'></table>");
    $(newTab).append("<tr></tr>");
    $(newTab).append("<th>Name</th>");
    $('.searchResults').append(newTab);

    for (var i = 0; i < result.length; i++) {
        var newItem = $("<tr></tr>");
        $(newItem).append("<td><a href='wine.php?iCode=one&id=" +  result[i].wine_id + "'>" + result[i].wine_name + "</a></td>");
        $('.searchResults #results').append(newItem);
    }
}