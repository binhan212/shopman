var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("dmccontroller", function ($scope, $http) {
    //cho dữ liệu vào dmc
    $http({
        method: "GET",
        url: "http://localhost:8000/api/dmc",
    }).then(function (response) {
        console.log(response.data);
        $scope.dmc = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm";
            if ($scope.dmc) {
                $scope.MaDM = "";
                $scope.TenDM = "";
                $scope.MaDML = "";
            }
        } else {
            $scope.modalTitle = "Sửa";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/dmc/" + id,
            }).then(function (response) {
                $scope.dmc = response.data;
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
                url: "http://localhost:8000/api/dmc/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaDM=$scope.dmc.MaDM;
        $scope.valueDM.TenDM=$scope.dmc.TenDM;
        $scope.valueDM.MaDML=$scope.dmc.MaDML;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/dmc",
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
                url: "http://localhost:8000/api/dmc/" + $scope.id,
                data: $scope.dmc,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
