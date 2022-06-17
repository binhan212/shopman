var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("adcontroller", function ($scope, $http) {
    //cho dữ liệu vào ad
    $http({
        method: "GET",
        url: "http://localhost:8000/api/ad",
    }).then(function (response) {
        console.log(response.data);
        $scope.ad = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm";
            if ($scope.ad) {
                $scope.MaADMIN = "";
                $scope.TenADMIN = "";
                $scope.TenDN = "";
                $scope.MatKhau = "";
                $scope.TrangThai = "";
            }
        } else {
            $scope.modalTitle = "Sửa";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/ad/" + id,
            }).then(function (response) {
                $scope.ad = response.data;
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
                url: "http://localhost:8000/api/ad/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaADMIN=$scope.ad.MaADMIN;
        $scope.valueDM.TenADMIN=$scope.ad.TenADMIN;
        $scope.valueDM.TenDN=$scope.ad.TenDN;
        $scope.valueDM.MatKhau=$scope.ad.MatKhau;
        $scope.valueDM.TrangThai=$scope.ad.TrangThai;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/ad",
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
                url: "http://localhost:8000/api/ad/" + $scope.id,
                data: $scope.ad,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
