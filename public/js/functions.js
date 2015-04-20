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

        div_predmetnik.siblings().each(function(){
            $(this).hide();
        });
        div_predmetnik.show();

        $(this).siblings().each(function(){
           $(this).removeClass('active');
        });
        $(this).addClass('active');

    });
});