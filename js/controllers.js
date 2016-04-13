angular.module("QuestionsApp")
.controller("MainController", function($scope,  $http){
  $scope.intents = 0;
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
      $scope.intents += 1;

    }
  }
})
.controller('LoginController',function($scope,$http, $mdToast, $rootScope){
  $scope.user = '';
  $scope.password = '';
  $scope.iniciar = function() {
      if ($scope.user != '' && $scope.password!='') {
        $http.get('/controllers/user/user.php?username='+$scope.user+'&password='+$scope.password)
        .success(function (data) {
          if (data.status == true) {
            $rootScope.userauth = {id: data.id, username:data.username, type: data.type};
            $location.path(data.type);
          }else {
            $mdToast.show($mdToast.simple().textContent('Error al iniciar'));
          }
        })
      }else{
        $mdToast.show($mdToast.simple().textContent('Ingrese datos'));
      }

  }
});
