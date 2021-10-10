$(document).ready(function() {
    $(document).on('click', '#getID', function(e) {
        e.preventDefault();
        var uid = $(this).data('id');
        $('.btn').click(function() {
            $("#view").load("./cthoadon.php", { "id": uid });
            $("#view").css({
                "position": "fixed",
                "background": "#80808091",
                "width": "100%",
                "z-index": 99,
                "top": 0,
                "left": 0,
                "height": "100%",
                "display": "block"
            });
        });
    });
    $("#view").click(function() {
        $("#view").css("display", "none");
    });
});