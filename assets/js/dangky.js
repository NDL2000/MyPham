$(document).ready(function() {
    $("#email").keyup(function() {
        $.ajax({
            type: "POST",
            url: "./xulydangky.php",
            data: {
                "checkemail": $("input[name=email]").val(),
            },
            success: function(data) {
                $("#error").html(data);
            }
        })
    });
});