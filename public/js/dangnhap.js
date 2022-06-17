var app = angular.module("myapp", []); //tao 1 module
app.controller("dangnhapcontroller", function ($scope, $http) {
    $scope.dn={
        tk:'',
        mk:''
    };
    //cho dữ liệu vào ad
    $scope.login=function(data){
        console.log(data);
        $http({
            method: "POST",
            url: "http://localhost:8000/api/dangnhap",
            data: data,
            "content-Type": "application/json",
        }).then(function (response) {
            $scope.kq=response.data;
            console.log($scope.kq);
            if($scope.kq=='ok'){
                document.location.href="/admin/thongke";
            }
            else{~
                alert('TK or MK không đúng!');
                window.location.reload();
            }
        })
    }

});
