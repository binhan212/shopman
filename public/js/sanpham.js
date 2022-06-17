var app = angular.module("myapp", ["angularUtils.directives.dirPagination",'ngFileUpload']); //tao 1 module
app.controller("sanphamcontroller", function ($scope, $http,Upload,$timeout) {
  $scope.limitRow=10;
    //cho dữ liệu vào sanpham
    $scope.slm=-1;
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sanpham",
    }).then(function (response) {
        console.log(response.data.data);
        $scope.sanphams = response.data.data;

    });


    $scope.product = {
        "MaSP": "",
        "TenSP": "",
        "MoTa": "",
        "GiamGia": "",
        "MaDMC": "",
        "mausacs": [
          {
            "MaMS": "",
            "TenMS": "",
            "AnhMS": "",
            "MaSP": "",
            "Gia": "",
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": "",
            "TenMS": "",
            "AnhMS": "",
            "MaSP": "",
            "Gia": "",
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": "",
            "TenMS": "",
            "AnhMS": "",
            "MaSP": "",
            "Gia": "",
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": "",
            "TenMS": "",
            "AnhMS": "",
            "MaSP": "",
            "Gia": "",
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS":"",
            "TenMS": "",
            "AnhMS": "",
            "MaSP": "",
            "Gia": "",
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          }

        ]
      }

      $scope.sanpham={
        "MaSP": 1,
        "TenSP": "Áo khoác nam",
        "MoTa": "không có",
        "GiamGia":"10",
        "MaDMC": "1",
        "mausacs": [
          {
            "MaMS": 1,
            "TenMS": "",
            "AnhMS": "7803581209a4f12f9c4cce0d33720468.jpeg",
            "MaSP": "1",
            "Gia": 38000,
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": 1,
            "TenMS": "",
            "AnhMS": "7803581209a4f12f9c4cce0d33720468.jpeg",
            "MaSP": "1",
            "Gia": 38000,
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": 1,
            "TenMS": "",
            "AnhMS": "7803581209a4f12f9c4cce0d33720468.jpeg",
            "MaSP": "1",
            "Gia": 38000,
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": 1,
            "TenMS": "",
            "AnhMS": "7803581209a4f12f9c4cce0d33720468.jpeg",
            "MaSP": "1",
            "Gia": 38000,
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          },
          {
            "MaMS": 1,
            "TenMS": "",
            "AnhMS": "7803581209a4f12f9c4cce0d33720468.jpeg",
            "MaSP": "1",
            "Gia": 38000,
            "sizes": [
              {
                "MaSize": "",
                "TenSize": "",
                "SoLuongTonKho": "",
                "MaMS": ""
              },
             
            ]
          }

        ]
      }

    //hiển thị form sửa, tạo
    $scope.showmodal = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm";
            $("#addSize").show();
            $("#editSize").hide();
            if ($scope.sanpham) {
                $scope.sanpham=$scope.product;
            }
        } else {
            $scope.modalTitle = "Sửa";
            $("#editSize").show();
            $("#addSize").hide();
            // $("#btnAdd").hide();
            $http({
                method: "GET",
                url: "http://localhost:8000/api/sanpham/" + id,
            }).then(function (response) {
                $scope.sanpham = response.data.data;
                console.log($scope.sanpham.mausacs)

                
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
                url: "http://localhost:8000/api/sanpham/" + id,
            }).then(function (response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    };

    //lưu khi ấn vào nút save
    //$scope.valueDM={}
    $scope.saveData = function (sp) {
        console.log(sp);
        if ($scope.id == 0) {
          $scope.files = $scope.files.filter(file => file != undefined);
            
          console.log($scope.files);
          if ($scope.files && $scope.files.length) {
            Upload.upload({
                url: '/file',
                data: {
                    files: $scope.files
                }
            }).then(function (response) {
                $timeout(function () {
                    $scope.result = response.data;
                });
            }, function (response) {
                if (response.status > 0) {
                    $scope.errorMsg = response.status + ': ' + response.data;
                }
            }, function (evt) {
                $scope.progress = 
                    Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
            });
          }
        
        $http({
            method: "POST",
            url: "http://localhost:8000/api/sanpham",
            data: sp,
            "content-Type": "application/json",
        }).then(function (response) {
            $scope.message = response.data;
            console.log(response.data);

           

            location.reload();
        });
        }else {
        //sua san pham
        if($scope.slm>=0){
        $scope.sanpham.mausacs[$scope.slm].sizes=$scope.sizeMtl;
        }

          $scope.files = $scope.files.filter(file => file != undefined);
          console.log($scope.files);
          if ($scope.files && $scope.files.length) {
              Upload.upload({
                  url: '/file',
                  data: {
                      files: $scope.files
                  }
              }).then(function (response) {
                  $timeout(function () {
                      $scope.result = response.data;
                  });
              }, function (response) {
                  if (response.status > 0) {
                      $scope.errorMsg = response.status + ': ' + response.data;
                  }
              }, function (evt) {
                  $scope.progress = 
                      Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
              });
      };


        $http({
            method: "PUT",
            url: "http://localhost:8000/api/sanpham/" + $scope.id,
            data: $scope.sanpham,
            "content-Type": "application/json",
        }).then(function (response) {
            $scope.message = response.data;
            console.log(54);
            console.log(response.data);
            location.reload();
        });
        
    };
    }





    $scope.emptyImage = function () {
        $scope.mausac.imageName = '';
        $scope.mausac.dataImage = '';
        $scope.stepsModel = [];
    }

    $scope.files=[...Array(5)]

    $scope.imageUpload = function (file, index) {
      console.log(file);
      $scope.sanpham.mausacs[index].AnhMS = file.name;
      $scope.files[index]=file;
        // var files = event.target.files;

        // for (var i = 0; i < files.length; i++) {
        //     var file = files[i];
        //     var reader = new FileReader();
        //     reader.onload = $scope.imageIsLoaded;
        //     reader.readAsDataURL(file);
        //     $scope.sanpham.mausacs[index].AnhMS = file.name;
        //     console.log($scope.sanpham.mausacs);
        // }
    }

    $scope.imageIsLoaded = function (e) {
        $scope.$apply(function () {
            $scope.stepsModel = [];

            $scope.stepsModel.push(e.target.result);
            mausac.dataImage = e.target.result;
            console.log($scope.mausac.dataImage);
        });
    }












    $scope.getSize=function(slm,masp){
        $scope.showsizeofcolor = slm;
        if(masp!=''){
            $scope.slm=slm;
            $scope.sizeMtl=$scope.sanpham.mausacs[slm].sizes;
            console.log($scope.sizeMtl);
        }
        else{
            this.preventDefault();
        }
        
    }




    //sd product=sanpham
    $scope.quantyIem=0;
    $scope.addFormSize=function(index){
        $scope.sanpham.mausacs[index].sizes.push({
            "MaSize": "",
            "TenSize": "",
            "SoLuongTonKho": "",
            "MaMS": ""
          })

    }
    $scope.showsizeofcolor = 0;
    $scope.deleteSize = function (ms, index){
       let index1 = $scope.sanpham.mausacs.findIndex(ms1 => ms1.MaMS == ms.MaMS)
       $scope.sanpham.mausacs[index1].sizes.splice(index, 1);
    }

});
