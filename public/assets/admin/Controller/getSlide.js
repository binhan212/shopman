
app.controller('getSlide',['$scope','$http',getSlide]);
function getSlide($scope,$http)
{
	$scope.hello = "Xin chao angular";
	$http.get("/BTLZB/api/getSlide.php").success(function(data){
		console.log(data);
		$scope.datas = data;
	}).error(function(data){
		
	});
}