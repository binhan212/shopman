app.controller("getNhanvien", function ($scope, $http) {
    $http({
        method: "GET",
        url: '/BTLZB/api/getNhanvien.php'
    }).then(function (response) {
        $scope.datas = response.data;
        console.log($scope.nhanviens);
    })
})