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
    if(window.localStorage)
    {
        $('.storage-letter').on('click', function()
        {
            localStorage.setItem('letter', $(this).data('id'));
        });
        $('.back-page').on('click', function()
        {
            var letter = localStorage.getItem('letter');
            if( letter != null && letter != undefined )
                location.href = '/'+letter;
            else
                location.href = '/';
        });
    }
    else
    {
        throw "your browser does not have support to HTML5 localStorage";
    }
});
