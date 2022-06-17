var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("dmlcontroller", function ($scope, $http) {
    //cho dữ liệu vào dml
    $http({
        method: "GET",
        url: "http://localhost:8000/api/dml",
    }).then(function (response) {
        console.log(response.data);
        $scope.dml = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm danh mục";
            if ($scope.dml) {
                $scope.MaDM = "";
                $scope.TenDM = "";
            }
        } else {
            $scope.modalTitle = "Sửa danh mục";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/dml/" + id,
            }).then(function (response) {
                $scope.dml = response.data;
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
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/dml/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaDM=$scope.dml.MaDM;
        $scope.valueDM.TenDM=$scope.dml.TenDM;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/dml",
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
                url: "http://localhost:8000/api/dml/" + $scope.id,
                data: $scope.dml,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };
});
