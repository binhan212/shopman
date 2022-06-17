// var app = angular.module('myapp', []); //tao 1 module
// app.controller('shopcontroller', function($scope, $http) { //tao 1 controller
//     $scope.dmc=function($id){
//         return $id;
//     }
// });
function myAjax() {
    $.ajax({
         type: "POST",
         url: './shop.php',
         data:{action:'call_this'},
         success:function(html) {
           alert(html);
         }
    });
}