var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("ctdhcontroller", function ($scope, $http) {
    //cho dữ liệu vào ctdh
    $http({
        method: "GET",
        url: "http://localhost:8000/api/ctdh",
    }).then(function (response) {
        console.log(response.data);
        $scope.ctdh = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm";
            if ($scope.ctdh) {
                $scope.MaCTDH = "";
                $scope.MaSize = "";
                $scope.GiamGia = "";
                $scope.SoLuong = "";
                $scope.MaDH = "";
            }
        } else {
            $scope.modalTitle = "Sửa";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/ctdh/" + id,
            }).then(function (response) {
                $scope.ctdh = response.data;
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
                url: "http://localhost:8000/api/ctdh/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaCTDH=$scope.ctdh.MaCTDH;
        $scope.valueDM.MaSize=$scope.ctdh.MaSize;
        $scope.valueDM.GiamGia=$scope.ctdh.GiamGia;
        $scope.valueDM.SoLuong=$scope.ctdh.SoLuong;
        $scope.valueDM.MaDH=$scope.ctdh.MaDH;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/ctdh",
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
                url: "http://localhost:8000/api/ctdh/" + $scope.id,
                data: $scope.ctdh,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
