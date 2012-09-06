
function markControlAsError(arr_ids) {
    for (var i = 0, item; item = arr_ids[i++];) {
        document.getElementById(item).setAttribute("class", "control-group error");
    }
}