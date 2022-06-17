var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]); //tao 1 module
app.controller("donhangcontroller", function ($scope, $http) {
    //cho dữ liệu vào donhang
    $http({
        method: "GET",
        url: "http://localhost:8000/api/donhang",
    }).then(function (response) {
        console.log(response.data);
        $scope.donhang = response.data;
    });

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm danh mục";
            if ($scope.donhang) {
                $scope.MaDH = "";
                $scope.NgayDatHang = "";
                $scope.ThanhTien = "";
                $scope.DiaChiGiaoHang = "";
                $scope.SDT = "";
                $scope.HoTen = "";
                $scope.GhiChu = "";
                $scope.MaKH = "";
            }
        } else {
            $scope.modalTitle = "Sửa danh mục";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/donhang/" + id,
            }).then(function (response) {
                $scope.donhang = response.data;
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
                url: "http://localhost:8000/api/donhang/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    $scope.valueDM={}
    $scope.saveData = function () {
        $scope.valueDM.MaDH=$scope.donhang.MaDH;
        $scope.valueDM.NgayDatHang=$scope.donhang.NgayDatHang;
        $scope.valueDM.ThanhTien=$scope.donhang.ThanhTien;
        $scope.valueDM.DiaChiGiaoHang=$scope.donhang.DiaChiGiaoHang;
        $scope.valueDM.SDT=$scope.donhang.SDT;
        $scope.valueDM.HoTen=$scope.donhang.HoTen;
        $scope.valueDM.GhiChu=$scope.donhang.GhiChu;
        $scope.valueDM.MaKH=$scope.donhang.MaKH;
        console.log($scope.valueDM);
        if ($scope.id == 0) {
            //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/donhang",
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
                url: "http://localhost:8000/api/donhang/" + $scope.id,
                data: $scope.donhang,
                "content-Type": "application/json",
            }).then(function (response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        }
    };

    
    $scope.InHD=function(MaDH){
        $http({
            method: "GET",
            url: "http://localhost:8000/api/getDHAllInfo/"+MaDH,
        }).then(function (response) {
            $scope.ct = response.data;
            // console.log($scope.ct);
            $scope.ct.ctdhs.forEach(item => {
                $http({
                    method: "GET",
                    url: "http://localhost:8000/api/getSPwithSize/"+item.MaSize,
                }).then(function (response) {
                    console.log(response.data.mausac);
                    item['TenSP']= response.data.mausac.sanpham.TenSP;
                    item['Gia']= response.data.mausac.Gia;
                });
            })
            console.log($scope.ct);
        });
    }


});
