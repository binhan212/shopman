<!DOCTYPE html>
<html lang="en" ng-app="myapp">
  <head>
    <title>GioHang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/trangChu/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/trangChu/css/animate.css">
    
    <link rel="stylesheet" href="/trangChu/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/trangChu/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/trangChu/css/magnific-popup.css">

    <link rel="stylesheet" href="/trangChu/css/aos.css">

    <link rel="stylesheet" href="/trangChu/css/ionicons.min.css">

    <link rel="stylesheet" href="/trangChu/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/trangChu/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/trangChu/css/flaticon.css">
    <link rel="stylesheet" href="/trangChu/css/icomoon.css">
    <link rel="stylesheet" href="/trangChu/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  </head>
  <body class="goto-here" ng-controller="cartcontroller">
    @include('includes_TC.header')

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Ảnh</th>
						        <th>Tên Sản Phẩm</th>
						        <th>Giá</th>
						        <th>Giảm Giá</th>
						        <th>Số Lượng</th>
						        <th>Tổng Tiền</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr ng-repeat="s in sanphams" class="text-center">
						        <td class="product-remove"><a href="#" ng-click="delete($index)"><span class="ion-ios-close"></span></a></td>
						        
						        <td><img src="/upload/sanpham/@{{s.mausac.AnhMS}}" alt="lỗi" style="width:80px;"></td>
						        
						        <td class="product-name">
						        	<h3>@{{s.mausac.sanpham.TenSP}}</h3>
						        </td>
						        
						        <td class="price">@{{s.mausac.Gia}} VNĐ</td>
						        <td>
									    <p>@{{s.mausac.sanpham.GiamGia}}%</p>
								    </td>
						        <td  class="price" style="display: flex; justify-content: center;padding: 66px 0px;">
                        <button style="border: 1px solid black; width: 36px;background-color:aliceblue;border:none;outline:none;"  ng-click="giamQty(s, $index)">-</button>
                        <div  style="width: 50px">

                          <input type="text" ng-model="s.quantity" class="quantity form-control input-number" style="width: 100%">
                        </div>
                        <button style="border: 1px solid black; width: 36px;background-color:aliceblue;border:none;outline:none;" ng-click="tangQty(s, $index)">+</button>
					          </td>
								
						        <td class="total">@{{(s.mausac.Gia - (s.mausac.Gia * s.mausac.sanpham.GiamGia /100)) * s.quantity}} VNĐ</td>
						      </tr>
                              <!-- END TR-->
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>

			<p style="padding-top: 20px;padding-right: 20px;text-align:right;"><a href="#" class="btn btn-primary py-3 px-4" ng-click="goLink()">Thanh Toán</a></p>
		</div>
		</section>
        @include('includes_TC.footer')
    
  



  <script src="/trangChu/js/jquery.min.js"></script>
  <script src="/trangChu/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/trangChu/js/popper.min.js"></script>
  <script src="/trangChu/js/bootstrap.min.js"></script>
  <script src="/trangChu/js/jquery.easing.1.3.js"></script>
  <script src="/trangChu/js/jquery.waypoints.min.js"></script>
  <script src="/trangChu/js/jquery.stellar.min.js"></script>
  <script src="/trangChu/js/owl.carousel.min.js"></script>
  <script src="/trangChu/js/jquery.magnific-popup.min.js"></script>
  <script src="/trangChu/js/aos.js"></script>
  <script src="/trangChu/js/jquery.animateNumber.min.js"></script>
  <script src="/trangChu/js/bootstrap-datepicker.js"></script>
  <script src="/trangChu/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/trangChu/js/google-map.js"></script>
  <script src="/trangChu/js/main.js"></script>

  <script src="/js/angular.min.js"></script>
  <script src="/js/appTC.js"></script>
  <script src="/js/giohang.js"></script>

  </body>
</html>