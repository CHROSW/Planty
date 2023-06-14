JQuery('qf-increase-btn').bind("click", function(){
    input=JQuery('.rnnumeric').Child().Child().Child().Child().find('.rnInputPrice');
    var value = parseInt(input.attr('defaultval'), 10);
    value = isNaN(value) ? 0 : value;
    if (limit && value >= limit) return;
    value++;
    input.val(Math.max(parseInt(input.val())+value,0));
});

JQuery('qf-increase-btn').bind("click", function(){
    input=JQuery('.rnnumeric').Child().Child().Child().Child().find('.rnInputPrice');
    var value=parseInt(input.attr('defaultval'), 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    if (limit && value <= limit) return;
    value--;
    input.val(Math.max(parseInt(input.val())+value,0));
});