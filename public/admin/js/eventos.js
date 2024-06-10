// MODAL
// SHOWING MODAL WITH EFFECT
// $('.modal-effect').on('click', function (e) {
//     e.preventDefault();
//     var effect = $(this).attr('data-bs-effect');
//     var modal_id = $(this).attr('data-modal');
//     $('#'+modal_id).addClass(effect);
// });
$(document).on('click','.modal-effect',function (e) {
    e.preventDefault();
    var effect = $(this).attr('data-bs-effect');
    var modal_id = $(this).attr('data-modal');
    $('#'+modal_id).modal('show');
    $('#'+modal_id).addClass(effect);
});
// HIDE MODAL WITH EFFECT
$('.modal.modal-effect').on('hidden.bs.modal', function (e) {
    $(this).removeClass(function (index, className) {
        return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
    });
});
