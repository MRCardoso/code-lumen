$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
$(document).ready(function()
{
    $(".remove-link").on("click", function (e)
    {
        e.preventDefault();
        $("#form-delete").attr('action',$(this).data("url"));
    });
});
