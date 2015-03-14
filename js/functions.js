function gotoUrl(section, page, time){
    
    if(typeof(time) === 'undefined')
        var time = 2000;
    
    setTimeout(function(){
        window.location = "?section=" + section + "&page=" + page;
    },time);
    
}

function reset_selectpicker(selector){
    $(selector).val(0);
    $('.selectpicker').selectpicker('refresh');
}

function reset_form(selectorClass, selectorID){
    
    //reset inputs
    $( selectorClass + ' input:not([type="radio"])').val('');
    
    //reset radio
    $('input:radio:first').prop('checked', true);
    
    //reset selectpicker
    if( typeof(selectorID) !== 'undefined'){
        reset_selectpicker(selectorID);
    }
}

function update_amount(id, amount){
    var speed = 100;
    $("tr[data-target='.c_row" + id + "']").children('td:last-child').animate({
        opacity: 0
    },speed, function(){
        $("tr[data-target='.c_row" + id + "']").children('td:last-child').html( amount.replace('.',',') + " &euro;");
        $(this).animate({opacity:1},speed);
    });
}

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};