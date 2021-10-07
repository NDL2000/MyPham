$(document).ready(function(){
    $("#quantity").keyup(function(){
        if($("#quantity").val()<=0) {
            $("#add_cart").attr("disabled",true);
            $("#add_cart").css({"cursor":"not-allowed","opacity":0.3});
        }
        else {
            $("#add_cart").attr("disabled",false);
            $("#add_cart").css({"cursor":"pointer","opacity":1});
        }
    });
    $("#minus_quantity,#plus_quantity").click(function(e){
        e.preventDefault();
        if($("#quantity").val()<0) {
            $("#add_cart").attr("disabled",true);
            $("#add_cart").css({"cursor":"not-allowed","opacity":0.3});
        }
        else {
            $("#add_cart").attr("disabled",false);
            $("#add_cart").css({"cursor":"pointer","opacity":1});
        }
        
    });
    $("#add_cart").click(function(){
        link = window.location.href.split('='); 
        $.ajax({
            type: "POST",
            url: "../User/addcart.php",
            data: {
                "id":link[2],
                "quantity":$("#quantity").val()
            },
            success: function(data) {
                alert(data); 
            }
        })
    });
    // Delete cart
    $(".delete").click(function(){
        var kq = confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng");
        console.log(kq);
        if(kq==true) {
            $.ajax({
                type: "POST",
                url: "../User/deletecart.php",
                data: {
                    "id":$(".delete").attr("id"),
                },
                success: function(data) {
                    alert(data); 
                }
            })
        }
       
    });
    // Update cart
    $("#quantity").keyup(function(){
        if($("#quantity").val()<=0) {
            $("#update_cart").attr("disabled",true);
            $("#update_cart").css({"cursor":"not-allowed","opacity":0.3});
        }
        else {
            $("#update_cart").attr("disabled",false);
            $("#update_cart").css({"cursor":"pointer","opacity":1});
        }
    });
   
});