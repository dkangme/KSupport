var app = angular.module('angularTable', ['angularUtils.directives.dirPagination']);

app.controller('listdata',function($scope, $http){

	$scope.eventos = []; //declare an empty array
    
    $http.get("/admin/evento/json").success(function(response){ 
        $scope.eventos = response;  //ajax request to fetch data into $scope.data
    });

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

});