/*function decreaseValue(iclass, ipos, limit) {
    var input = document.getElementsByClassName("rnInputPrice")[ipos];
    var value=parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    if (limit && value <= limit) return;
    value--;
    document.getElementsByClassName("rnInputPrice")[ipos].value = value;
    input.setAttribute("value", value);
}*/


/**
 * Increase Value Function
 */

/*function increaseValue(iclass, ipos, limit) {
    var input = document.getElementsByClassName("rnInputPrice")[ipos];
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    if (limit && value >= limit) return;
    value++;
    document.getElementsByClassName("rnInputPrice")[ipos].value = value;
    input.setAttribute("value", value);
}*/