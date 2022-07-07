var i = 0;
$('#add').click(function () {
    i++;
    var value = $('#sertifikasi-input').val();
    $('#sertifikasi-dynamic').append("<div id='sertifikasi-item" + i + "' class='form-group row align-items-center'><div class='col-10 mb-0'><input name='sertifikasi[]' type='text' class='form-control form-control-user' value='" + value + "' readOnly></div><div class='col-2'><button type='button' class='btn btn-danger btn-user remove-button'><i class='fas fa-trash-alt'></i></button></div></div>");
    $('#sertifikasi-input').val('');

});
$(document).on('click', '.remove-button', function () {
    $(this).closest('.form-group').remove();
});