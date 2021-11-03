$('#formulario').change(function () {
    const pickUpDate = $('#pickUpDate').val();
    const dropOffDate = $('#dropOffDate').val();
    if (pickUpDate > dropOffDate) {
        $('#dropOffDate').val(pickUpDate);
    }
}); 

$('#payment-form').change(function () {
    const pickUpDate = $('#pickUpDate').val();
    const dropOffDate = $('#dropOffDate').val();
    if (pickUpDate > dropOffDate) {
        $('#dropOffDate').val(pickUpDate);
    }
}); 