$(document).ready(function () {
    $('.spinner').hide();
    $('#card-button').click(function () {     
        let inicio = new Date($('#pickUpDate').val());
        let fim = new Date($('#dropOffDate').val());
        let diferencaAbs = Math.abs(fim - inicio);
        let diferencaDias = Math.ceil(diferencaAbs / (1000 * 60 * 60 * 24));

        if(diferencaDias < 3 || diferencaDias > 30){
            $('.spinner').hide();
        }
        if($('.contactName').val() == '' || $('.contactEmail').val() == '' || $('.contactSms').val() == ''){
            $('.spinner').hide();
        }
        if($('#name').val() == '' || $('#email').val() == '' || $('#phone').val() == '' || 
                $('#dateOfBirth').val() == '' || $('#drivinglicence').val() == '' || $('#carros').val() == ''){
            // booking form validation
            $('.spinner').hide();

        }
        //
    });
});

$(document).submit(function () {
    $('.spinner').show();
});


