var app = angular.module("myapp", []); //tao 1 module
app.controller("dangkyTCcontroller", function ($scope, $http) {
    $scope.kh={
        "TenKH":"",
        "DiaChi":"",
        "SDT":"",
        "Email":"",
        "TenDN":"",
        "MatKhau":""
    }

    $scope.dangky=function(kh){
        console.log(kh);
        var ck=true;
        for(var i in kh){
            if(kh[i]==""){
                alert("trường "+i+" không được để rỗng!");
                ck=false;
                document.location.reload();
                break;
            }
        }
        if(ck){
            $http({
                method: "POST",
                url: "http://localhost:8000/api/khachhang",
                data: kh,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.db = response.data;
                localStorage.setItem('MaKH',JSON.stringify($scope.db.MaKH));
                alert("Bạn đã đăng ký thành công!");
                document.location.href="/trangchu/detailpay";
            });
        }
        
    }
    

});