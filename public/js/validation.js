$(document).ready(function () {
    $('#submit').click(function (e) {
        
        let inicio = new Date($('#pickUpDate').val());
        let fim = new Date($('#dropOffDate').val());

        let diferencaAbs = Math.abs(fim - inicio);
        let diferencaDias = Math.ceil(diferencaAbs / (1000 * 60 * 60 * 24));
        let age = $('.age').val();

        if (diferencaDias < 3) {  
            window.alert('Renting Minimum of 3 days. ');
            $('.age').val(age);
            e.preventDefault();     
        }
        if (diferencaDias > 30) {
            window.alert('Renting Maximum of 30 days. ');
            $('.age').val(age);
            e.preventDefault();       
        }     
    });

});