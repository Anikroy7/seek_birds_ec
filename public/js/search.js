document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("searchField")
        .addEventListener("keyup", function (e) {
            $("#searchModal").attr("x-data", true);
        });
});
