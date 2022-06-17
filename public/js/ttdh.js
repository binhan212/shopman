var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("ttdhcontroller", function ($scope, $http) {
    //cho dữ liệu vào ttdh
    $http({
        method: "GET",
        url: "http://localhost:8000/api/ttdh",
    }).then(function (response) {
        console.log(response.data);
        $scope.ttdh = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm danh mục";
            if ($scope.ttdh) {
                $scope.MaTT = "";
                $scope.TenTT = "";
                $scope.ThoiGian = "";
                $scope.MaDH = "";
            }
        } else {
            $scope.modalTitle = "Sửa danh mục";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/ttdh/" + id,
            }).then(function (response) {
                $scope.ttdh = response.data;
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
                url: "http://localhost:8000/api/ttdh/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaTT=$scope.ttdh.MaTT;
        $scope.valueDM.TenTT=$scope.ttdh.TenTT;
        $scope.valueDM.ThoiGian=$scope.ttdh.ThoiGian;
        $scope.valueDM.MaDH=$scope.ttdh.MaDH;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/ttdh",
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
                url: "http://localhost:8000/api/ttdh/" + $scope.id,
                data: $scope.ttdh,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
