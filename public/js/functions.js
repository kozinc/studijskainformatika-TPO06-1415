$(document).ready(function(){

    $('.jqueryte').jqte();

   /* $('#iskalnik_studentov').on('change', function(){

        var search = $(this).val();
        if(search.length > 1){
            $.ajax({
                type: 'POST',
                url: $('#iskalnik_studentov_form').attr('action'),
                data: '_token='+$('#_token').val()+'&data='+search+'&return_type=json',
                success: function(data) {
                    alert(data);
                },
                fail: function(error){
                    alert(error);
                }
            });
        }
    }); */

});