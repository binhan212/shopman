var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("sizecontroller", function ($scope, $http) {
    //cho dữ liệu vào size
    $http({
        method: "GET",
        url: "http://localhost:8000/api/size",
    }).then(function (response) {
        console.log(response.data);
        $scope.size = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm danh mục";
            if ($scope.size) {
                $scope.MaSize = "";
                $scope.TenSize = "";
                $scope.SoLuongTonKho = "";
                $scope.MaMS = "";
            }
        } else {
            $scope.modalTitle = "Sửa danh mục";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/size/" + id,
            }).then(function (response) {
                $scope.size = response.data;
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
                url: "http://localhost:8000/api/size/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaSize=$scope.size.MaSize;
        $scope.valueDM.TenSize=$scope.size.TenSize;
        $scope.valueDM.SoLuongTonKho=$scope.size.SoLuongTonKho;
        $scope.valueDM.MaMS=$scope.size.MaMS;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/size",
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
                url: "http://localhost:8000/api/size/" + $scope.id,
                data: $scope.size,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
