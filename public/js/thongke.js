var app = angular.module("myapp", []); //tao 1 module
app.controller("thongkecontroller", function ($scope, $http) {
    $scope.tongtien=0;
    //lấy sl khách hàng
    $http({
        method: "GET",
        url: "http://localhost:8000/api/khachhang",
    }).then(function (response) {
        
        $scope.sl = (response.data).length;
        console.log($scope.sl);
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/donhang",
    }).then(function (response) {
        console.log(response.data);
        $scope.sl_don = (response.data).length;
        $scope.donhang = response.data;
        $scope.donhang.forEach(item=>{
            console.log(item.ThanhTien);
            $scope.tongtien=$scope.tongtien+item.ThanhTien;
        })
    });

    $scope.load=function(){
        document.location.reload();
    }
    
});
