//Страница - создание
$('.create').click(function(){
    $('#cart').modal();
    return false;
});
// Страница - обновление
$('.update').click(function(){
    $('#update').modal();
    return false;
});
// Страница - удаление
$('.openmodal').click(function(){
    id = $(this).data('id');
    $('#id').val(id);
    $('#administration').modal();
    return false;
});


