$(document).ready(function() {
    $("#fromdate").mouseleave(function() {
        var fromdate = $("#fromdate").val();
        var date = fromdate.split("-");
        var day = parseInt(date[2])+1;
        var todate = date[0]+'-'+date[1]+'-'+day;
        $("#todate").attr("min",todate);   
    });
});