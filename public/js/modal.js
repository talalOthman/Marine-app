document.getElementById("trigger-btn").onclick = function () {
    var UserName = $(this).data('id');
    var link = document.getElementById("delete-button");
    link.setAttribute("href", "/admin_delete/" + UserName);
    return false;
}