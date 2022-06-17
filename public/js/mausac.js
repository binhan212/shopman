var app = angular.module("myapp", ["angularUtils.directives.dirPagination","ngFileUpload"]); //tao 1 module
app.controller("mausaccontroller", function ($scope, $http,Upload, $timeout) {
    //cho dữ liệu vào mausac
    $http({
        method: "GET",
        url: "http://localhost:8000/api/mausac",
    }).then(function (response) {
        console.log(response.data);
        $scope.mausac = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm danh mục";
            if ($scope.mausac) {
                delete $scope.mausac;
            }
        } else {
            $scope.modalTitle = "Sửa danh mục";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/mausac/" + id,
            }).then(function (response) {
                $scope.mausac = response.data;
                $scope.stepsModel.push('/upload/sanpham' + $scope.mausac.AnhMS);
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
                url: "http://localhost:8000/api/mausac/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/mausac",
                data: $scope.mausac,
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
                url: "http://localhost:8000/api/mausac/" + $scope.id,
                data: $scope.mausac,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };


    //upload File

    $scope.emptyImage = function () {
        $scope.mausac.imageName = '';
        $scope.mausac.dataImage = '';
        $scope.stepsModel = [];
    }

    $scope.imageUpload = function (event) {
        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = $scope.imageIsLoaded;
            reader.readAsDataURL(file);
            $scope.mausac.imageName = file.name;
            console.log($scope.mausac.imageName);
        }
    }

    $scope.imageIsLoaded = function (e) {
        $scope.$apply(function () {
            $scope.stepsModel = [];

            $scope.stepsModel.push(e.target.result);
            $scope.mausac.dataImage = e.target.result;
            console.log($scope.mausac.dataImage);
        });
    }



    //sắp sếp
    $scope.sortColumn='MaMS';
    $scope.reverse=false;

    $scope.sortData=function(column){
        if($scope.sortColumn==column){
            $scope.reverse=!$scope.reverse;
        }
        else{
            $scope.reverse=false;
        }
        $scope.sortColumn=column;
    }

    $scope.getSortClass=function(column){
        if($scope.sortColumn==column){
            return $scope.reverse?'arrow-up':'arrow-down';
        }
        return '';
    }

});
