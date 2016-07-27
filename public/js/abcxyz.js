$(function(){
    //tooltip item
    var $btchver = $('.bt_exp');
    $btchver.on('click', function(){
        var $aoddd = $(this).parent('.aoption').children('._exp_dropdown');
        if(!$aoddd.hasClass('_aoexp')){
            $(this).addClass('_aofocus');
            $('._exp_dropdown').removeClass('_aoexp');
            $aoddd.addClass('_aoexp');
        }else{
            $(this).removeClass('_aofocus');
            $aoddd.removeClass('_aoexp');
        }
    });
});