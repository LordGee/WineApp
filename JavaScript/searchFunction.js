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
        $(newItem).append("<td>" + result[i].wine_name + "</td>");
        $('.searchResults #results').append(newItem);
    }
}