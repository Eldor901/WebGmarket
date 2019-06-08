$(document).on('click', '.delete', function()
{
    var id = $(this).attr("rel");
    var route = $(this).attr("route");
    var token = $(this).attr("token");
    $.ajax(
        {
            type: "DELETE",
            url: route,
            data: {_token: token, id: id},
            success: function () {
                M.toast({html: 'product has been deleted', displayLength: 2000})
            }
        });

});


$("#table").on('click', '.remove', function (){
    $(this).closest('tr').fadeOut(500);
});
