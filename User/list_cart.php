
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="./assets/css/list_cart.css">
<?php
    include './head.php';
    $tongtien=0;
    if(isset($_SESSION['cart']) && $_SESSION['cart']!=null )
    {
        echo "<form action='Updatecart.php' method='post'>";
        echo "<table width='60%' class='table_cart'>";
        echo "<tr align='center'><h2 align='center' id='title'> THÔNG TIN GIỎ HÀNG</h2> </tr>";
        echo "<tr id='title_table'>";
        echo "<td>Mã SP</td>";
        echo "<td>Tên sản phẩm</td>";
        echo "<td>Đơn giá</td>";
        echo "<td>Số lượng</td>";
         echo "<td>Thành tiền</td>";
        echo "</tr>";
        foreach ($_SESSION['cart'] as $list) {         
        echo "<tr>";
        echo "<td>".$list['id']."</td>";
        echo "<td>".$list['name']."</td>";        
        $gia=number_format($list['price'],'0',',','.')."&#8363;";
        echo "<td>".$gia."</td>";        
        echo "<td><input type='number' min='1' id='quantity' name='soluong[".$list['id']."]' value='".$list['sl']."'></td>";        
        $thanhtien=$list['price']*$list['sl'];
        $tongtien=$tongtien+$thanhtien;
        $thanhtien=number_format($thanhtien,'0',',','.')."&#8363;";       
        echo "<td>".$thanhtien."</td>";
        echo "<td><a href='deletecart.php?id=".$list['id']."'>Xóa</a></td>";
        echo "</tr>";
        } 
         $tt=number_format($tongtien,'0',',','.')."&#8363;";
        echo "</table>
            <p align='right' style='width:1100px'><label>Tổng tiền:$tt</label></p>
            <div class='button_cart'>
            <a class='button-continue-shopping button primary is-outline' href='./header.php?url=sanpham'>
		←&nbsp;Tiếp tục xem sản phẩm	</a>
            <p align='left' style='width:1100px'><input type='submit' name='btnUpdate'  id='update_cart' value='Cập nhật'></p> 
            </div>
            ";
        echo "</form>";
    }
    else
    {
        echo '<div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">
                    
                    
                                                            
                            <div class="woocommerce"><div class="text-center pt pb">
        <div class="woocommerce-notices-wrapper"></div><p class="cart-empty woocommerce-info">Chưa có sản phẩm nào trong giỏ hàng.</p>		<p class="return-to-shop">
                <a class="button primary wc-backward" href="./header.php?url=sanpham">
                    Quay trở lại cửa hàng			</a>
            </p>
        </div></div>
    
                            
                                                    </div><!-- .col-inner -->
            </div><!-- .large-12 -->
        </div><!-- .row -->
    </div>';
    }
    include './footer.php';
?>
<script src="./assets/js/muahang.js"></script>

