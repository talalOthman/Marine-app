// $(window).on('load', function(){
//     $('#cover').fadeOut(1000);
// })

// if (document.readyState === "complete" || document.readyState === "interactive") {
//     $('#cover').hide();
// }

$(window).ready(function() {
    // Hide the 'cover' div
    $('#cover').hide();
});

$('#upload-btn').on('click', function(){
    $('#cover').show();
})

$(document).ready(function () {
    $('#upload-btn').attr('disabled', true);
    $('input:file').change(
        function () {
            if ($(this).val()) {
                $('#upload-btn').removeAttr('disabled');
            }
            else {
                $('#upload-btn').attr('disabled', true);
            }
        });
});





