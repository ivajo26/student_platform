angular.module("FinalApp")
.controller("MainController", function($scope,  $http){
  $http.get('/controllers/weekly/read_for_week.php')
    .success(function(data) {
      $scope.questions = data;
    });
});
