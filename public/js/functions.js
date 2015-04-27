$(document).ready(function(){
    $('.jqueryte').jqte();
    $('#studijski_program_ajax').change(function(){
        var kraj_izvajanja = $('option:selected', this).data('kraj_izvajanja');
        var oznaka = $('option:selected', this).data('oznaka');
        var stopnja = $('option:selected', this).data('stopnja');
        var trajanje = $('option:selected', this).data('trajanje_leta');
        $('#oznaka').html(oznaka);
        $('#kraj_izvajanja').html(kraj_izvajanja);
        $('#stopnja').html(stopnja);

        if(trajanje<3){
            $('#letnik-3').hide();
        }else{
            $('#letnik-3').show();
        }
    });

    $('.letnik-tab').click(function(){
        var letnik = $(this).data('letnik');
        var div_predmetnik;
        if(letnik==0){
            div_predmetnik = $('#prosto-izbirni');
        }else{
            div_predmetnik = $('#letnik-'+letnik);
        }
        $('.predmetnik-form').each(function(){
            $(this).hide();
        });

        div_predmetnik.siblings().each(function(){
            if(!$(this).hasClass('dodaj-predmet')){
                $(this).hide();
            }
        });
        div_predmetnik.show();

        $(this).siblings().each(function(){
           $(this).removeClass('active');
        });
        $(this).addClass('active');

    });

    $('.odpri-predmetnik-form').click(function(){
       $('.predmetnik-form').toggle();
    });

    $('#tip-select').change(function(){
        var tip = $(this).val();

        if(tip=='modulski'){
            $('.modul').show();
            $('.letnik').show();
        }else if(tip == 'prosto-izbirni'){
            $('.modul').hide();
            $('.letnik').hide();
        }else{
            $('.modul').hide();
            $('.letnik').show();
        }

    });

    $('.modul-select').change(function(){
        var value = $(this).val();
        if(value=='new'){
            $('.nov-modul').show();
        }else{
            $('.nov-modul').hide();
        }
    });

    $('#struktura-open').click(function(){
       $('#struktura').hide();
    });

    $('.program-tab').click(function(){
        var data = $(this).data('tab');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');

        if(data == 'info'){
            $('#program-info').show();
            $('#struktura').hide();
            $('#program-predmetniki').hide();
        }else if(data == 'struktura'){
            $('#program-info').hide();
            $('#program-predmetniki').hide();
            $('#struktura').show();
        }else{
            $('#program-predmetniki').show();
            $('#struktura').hide();
            $('#program-info').hide();
        }

    });

    $('#dodaj_letnik').click(function(){
        var letnik = $(this).data('letnik');
        $('#letnik-'+letnik).show();
        $('#status-'+letnik).val('create');
        if(letnik < 5){
            $(this).data('letnik',letnik+1);
        }else{
            $(this).hide();
        }
        $('#odstrani_letnik').data('letnik',letnik).html('Odstrani '+letnik+'. letnik').show();

    });

    $('#odstrani_letnik').click(function(){
        var letnik = $(this).data('letnik');
        $('#letnik-'+letnik).hide();
        $('#status-'+letnik).val('delete');
        if(letnik > 1){
            $(this).data('letnik',letnik-1).html('Odstrani '+(letnik-1)+'. letnik');
        }else{
            $(this).hide();
        }
        $('#dodaj_letnik').data('letnik',letnik).html('Dodaj letnik').show();
    });

});

