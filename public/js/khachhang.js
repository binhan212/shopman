var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("khachhangcontroller", function ($scope, $http) {
    //cho dữ liệu vào khachhang
    $http({
        method: "GET",
        url: "http://localhost:8000/api/khachhang",
    }).then(function (response) {
        console.log(response.data);
        $scope.khachhang = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm";
            if ($scope.khachhang) {
                $scope.MaKH = "";
                $scope.TenKH = "";
                $scope.DiaChi = "";
                $scope.SDT = "";
                $scope.Email = "";
                $scope.TenDN = "";
                $scope.MatKhau = "";
            }
        } else {
            $scope.modalTitle = "Sửa";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/khachhang/" + id,
            }).then(function (response) {
                $scope.khachhang = response.data;
            });
        }
        $("#modelId").modal("show");
    };

    
    //đóng modal
    $scope.closeModal = function () {
        $("#modelId").modal("hide");
    };

    //xóa
    $scope.deleteClick = function (id) {
        var hoi = confirm("Bạn có muốn xóa thật không?");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/khachhang/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        // $scope.valueDM.MaKH=$scope.khachhang.MaKH;
        $scope.valueDM.TenKH=$scope.khachhang.TenKH;
        $scope.valueDM.DiaChi=$scope.khachhang.DiaChi;
        $scope.valueDM.SDT=$scope.khachhang.SDT;
        $scope.valueDM.Email=$scope.khachhang.Email;
        $scope.valueDM.TenDN=$scope.khachhang.TenDN;
        $scope.valueDM.MatKhau=$scope.khachhang.MatKhau;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/khachhang",
                data: $scope.valueDM,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        } else {
            //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/khachhang/" + $scope.id,
                data: $scope.khachhang,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
