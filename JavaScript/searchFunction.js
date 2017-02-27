function search() {
    var searchValue = $("#winesearch").val();
    $.get("getWineByNameService.php?wine_name=" + searchValue, searchCallBack);
}

function searchCallBack(result) {

}