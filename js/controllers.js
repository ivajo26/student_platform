angular.module("FinalApp")
.controller("MainController", function($scope,  $http, LxNotificationService){

  $http.get('/controllers/weekly/read_for_week.php')
    .success(function(data) {
      $scope.questions = data;
      $http.get('controllers/user_answered/user_and_week.php')
        .success(function(data) {
          $scope.user_answered = data;
          for (var p in $scope.questions) {
            if (hasOwnProperty.call($scope.user_answered, p)) {
              $scope.questions[p].select = "1";
            }else {
              $scope.question = $scope.questions[p];
              break;
            }
          }
        });
    });

  $scope.validar = function(){
    if ($scope.question.select === $scope.question.correct) {
      $scope.questions[$scope.question.id] = $scope.question
      for (var c in $scope.questions) {
        if ($scope.questions[c].select==="") {
          $scope.question = $scope.questions[c];
          break;
        }
      }
    }else{
      LxNotificationService.error('Respuesta incorrecta');
    }
  }
})
.controller('LoginController',function($scope,  $http){
  $scope.company = '';
});
