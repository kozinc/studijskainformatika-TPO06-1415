$(document).ready(function(){
    $('.jqueryte').jqte();
    $('[data-toggle="tooltip"]').tooltip();
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
            div_predmetnik = $('#splošno-izbirni');
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
        }else if(tip == 'splošno-izbirni'){
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

    $('#izpitni_roki_vnos').change(function(){
        var value = $(this).val();
        if(value=='brez_prijave'){
            $('.skrijDatum').show();
        }else{
            $('.skrijDatum').hide();
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

    $('#dodaj_predmetnik').click(function(){
        var studijsko_leto = $('#predmetnik_leto_select').val();
        var link = $(this).data('href');
        window.location.href = link+studijsko_leto;
    });

    $('.count_kt').change(function(){
        var selected_options = $('.count_kt option:selected');
        var kt = 0;
        selected_options.each(function(){
            kt = kt + $(this).data('kt');
        });
        var skupno = $('#kt_skupno');
        skupno.html(skupno.data('obvezni')+kt);
    });

    $('#vsaPolaganja').click(function(){
       $('.vsaPolaganjaT').show();
        $('.zadnjePolaganjeT').hide();
        $('#vsa_polaganja').val(1);
    });

    $('#zadnjePolaganje').click(function(){
        $('.zadnjePolaganjeT').show();
        $('.vsaPolaganjaT').hide();
        $('#vsa_polaganja').val(0);
    });

    $('.multi-select').multiSelect({
        selectableOptgroup: true
    });

    $('.izpitni_roki').click(function(){
        var izpitni_rok_id = $(this).data('izpitni_rok_id');
        var action = $(this).data('action');
        var polaganje = parseInt($(this).data('polaganje'))+1;
        var pavzer = $(this).data('pavzer');
        $('#izpitni_rok_id').val(izpitni_rok_id);
        $('#action').val(action);
        var confirm_msg;
        if(action == 'prijava'){
            confirm_msg = 'To je vaše ' + polaganje + '. polaganje. ';
            if(pavzer == 1 || polaganje > 3){
                confirm_msg += 'Opravljanje izpita je plačljivo. ';
                $('#placilo_izpita').val(1);
            }
            confirm_msg += 'Želite nadaljevati s prijavo?';
        }else {
            confirm_msg = 'Ste prepričani, da se želite odjaviti od izpita?';
        }
        if(confirm(confirm_msg)){
            $('#prijava_na_izpit').submit();
        }
    });

    $('#predmet').change(function(){
        var id_predmeta = $(this).val();
        var izpitni_roki = $('#izpitni_roki_vnos');
        izpitni_roki.children('.p'+id_predmeta).show().siblings(':not(.p'+id_predmeta+')').hide();
    })

});

