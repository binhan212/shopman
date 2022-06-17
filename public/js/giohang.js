var app = angular.module("myapp", []);
app.controller("cartcontroller", function ($scope, $http,$rootScope) {
    //get
    if(!JSON.parse(localStorage.getItem(('cart')))){
        $rootScope.sl=0;
    }else{
        $rootScope.sl=JSON.parse(localStorage.getItem(('cart'))).length;
    }

    $rootScope.tkh=JSON.parse(localStorage.getItem(('MaKH')));
    console.log($rootScope.tkh);
    if($rootScope.tkh==null){
        $('#cli').hide();
    }
    else{
        $http({
            method: "GET",
            url: "http://localhost:8000/api/khachhang/" + $rootScope.tkh,
        }).then(function (response) {
            $rootScope.kh = response.data;
            console.log($rootScope.kh);

            $rootScope.name_client=$rootScope.kh.TenKH;
        });
        
    }
    
    $scope.cart=JSON.parse(localStorage.getItem('cart'));
    $http({
        method: "POST",
        url: "http://localhost:8000/api/cart",
        data: {
            cart: $scope.cart
        }
    }).then(function (response) {

        console.log(response.data);
        $scope.sanphams =response.data;
    });

    $scope.tangQty=function(sanpham, index){
        if(sanpham.quantity < sanpham.SoLuongTonKho) {
            sanpham.quantity++;
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart[index].quantity = sanpham.quantity;
            localStorage.setItem('cart', JSON.stringify(cart))
        }
    }

    $scope.giamQty=function(sanpham, index){
        if(sanpham.quantity > 1) {
            sanpham.quantity--;
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart[index].quantity = sanpham.quantity;
            localStorage.setItem('cart', JSON.stringify(cart))
        }
    }
    
    $scope.delete=function(index){
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart.splice(index,1);
            localStorage.setItem('cart', JSON.stringify(cart))
            document.location.reload();
    }

    $scope.goLink=function(){
        $scope.hasKH=JSON.parse(localStorage.getItem(('MaKH')));
        if(!$scope.hasKH){
            document.location.href="/dangnhap";
        }
        else{
            document.location.href="/trangchu/detailpay";

        }
        
    }

});