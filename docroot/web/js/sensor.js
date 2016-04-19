var app = angular.module('angularTable', []);

app.controller('listdata',function($scope, $http, $timeout){

	$scope.sensores = []; //declare an empty array

	$scope.getData = function (){
	    $http.get("/data/sensor/json").success(function(response){ 
	        $scope.sensores = response;  //ajax request to fetch data into $scope.data
	    });	
	}

	$scope.intervalFunction = function() {

		$timeout(function() {
			$scope.getData();
			$scope.intervalFunction();

		}, 5000);
	};

	$scope.intervalFunction();

	$http.get("/data/sensor/json").success(function(response){ 
		$scope.sensores = response;  //ajax request to fetch data into $scope.data
	});	
});

