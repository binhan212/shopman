var app = angular.module("myapp", []); //tao 1 module
app.controller("indoccontroller", function ($scope, $http, $rootScope) {
    
    //lấy chi tiết đh
    $scope.indoc=JSON.parse(localStorage.getItem('indoc'));
    $scope.ct=$scope.indoc;
    // $http({
    //     method: "GET",
    //     url: "http://localhost:8000/api/getDHAllInfo/"+$scope.indoc.MaDH,
    // }).then(function (response) {
    //     $scope.ct = response.data;
    //     console.log($scope.ct);
    // });

});
