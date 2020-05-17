function createTimer(  days , hours , min , sec  ){

    $('.con-clock svg g path').each(function(){
        if ( $(this).index() > 60 - sec ){
            $(this).addClass('st0').removeClass('st1');
        } else {
            $(this).addClass('st1').removeClass('st0');
        }
    });

    setInterval(function(){

        if ( sec - 1 < 0 ){
            $('.con-clock svg g path').removeClass('st1').addClass('st0');
            sec = 59;

            if ( min - 1 < 0 ){
                min = 59;

                if ( hours - 1 < 0 ){
                    
                    hours = 23;
                    days = days - 1;
                    
                } else {
                    hours = hours - 1;
                }

            } else {
                min = min - 1;
            }

        } else {
            sec = sec - 1;

            $('.con-clock svg g path').eq( 60 - sec ).removeClass('st0').addClass('st1');
        }

        if ( days > 0 ){
            $('.con-clock .top-days .count').html( days );
            $('.con-clock .item.h .number').html( hours );
            $('.con-clock .item.m .number').html( min );
            $('.con-clock .item.s .number').html( sec );
        }

    },1000)

}

$(document).ready(function(){ 

    if ( $('.con-clock').length ){

        var dateEND = $('.con-clock').attr('data-endtime')*1000;
        var curTime = Date.now();

        let diff = dateEND - curTime;

        const dayMulple = 60 * 60 * 24 * 1000;
        const howMulple = 60 * 60 * 1000;
        const minMulple = 60 * 1000;
        const secMulple = 1000;

        let days = Math.floor ( diff / dayMulple );
        let hours = Math.floor ( ( diff - days * dayMulple ) / howMulple );
        let min = Math.floor ( ( diff - days * dayMulple - hours * howMulple ) / minMulple );
        let sec = Math.floor ( ( diff - days * dayMulple - hours * howMulple - min * minMulple ) / secMulple );

        console.log( days , hours , min , sec );

        createTimer( days , hours , min , sec );
    }

})