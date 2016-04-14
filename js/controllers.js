angular.module("QuestionsApp")
.controller("StudentController", function($scope,  $http, $mdToast){
  $scope.intents = 0;
  $http.get('/controllers/weekly/read_for_week.php')
    .success(function(data) {
      console.log(data);
      $scope.questions = data;
      $http.get('controllers/user_answered/user_and_week.php')
        .success(function(data) {
          console.log(data);
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
    if ($scope.question.select === '') {
      $mdToast.show($mdToast.simple().textContent('Escoja una respuesta'));
    }else if ($scope.question.select === $scope.question.correct) {
        $scope.questions[$scope.question.id] = $scope.question
        $http.get('controllers/user_answered/save.php?week_q='+$scope.question.id+'&user='+1+'&intents='+$scope.intents);
        for (var c in $scope.questions) {
          if ($scope.questions[c].select==="") {
            $scope.question = $scope.questions[c];
            $scope.intents = 0;
            break;
          }
        }
      }else{
        $mdToast.show($mdToast.simple().textContent('Respuesta Incorrecta'));
        $scope.intents += 1;

      }
  }
})
.controller('LoginController',function($scope,$http, $mdToast, $rootScope, $location){
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
})
.controller('TeacherController',function($scope,$http, $mdToast, $rootScope, $location){
  $scope.question = '';
  $scope.answer1 = '';
  $scope.answer2 = '';
  $scope.answer3 = '';
  $scope.answer4 = '';
  $scope.correct = '';

  $scope.crear = function() {
    if ($scope.question != '' && $scope.answer1 != '' && $scope.answer2 != '' && $scope.answer3 != '' && $scope.answer4 != '' && $scope.correct != '') {
      $http.get('/controllers/weekly/create_q.php?question='+$scope.question+'&answer1='+$scope.answer1+'&answer2='+$scope.answer2+'&answer3='+$scope.answer3+'&answer4='+$scope.answer4+'&correct='+$scope.correct)
      $scope.question = '';
      $scope.answer1 = '';
      $scope.answer2 = '';
      $scope.answer3 = '';
      $scope.answer4 = '';
      $scope.correct = '';
      $mdToast.show($mdToast.simple().textContent('Pregunta guardada'));
      $http.get('controllers/question/all.php').success(function (data) {
        $scope.allquestions = data;
        console.log(data);
      });
    }else {
      $mdToast.show($mdToast.simple().textContent('No se han ingresado algunos datos'));
    }
  }

  $http.get('controllers/question/all.php').success(function (data) {
    $scope.allquestions = data;
    console.log(data);
  });

  $http.get('controllers/week/all.php').success(function (data) {
    $scope.allweeks = data;
    console.log(data);
  });

  $scope.onlyweek = function(date) {
    var day = date.getDay();
    return day === 1 || day === 2 || day === 3 || day === 4 || day === 5;
  }
  $scope.start_date = '';
  $scope.end_date = '';
  $scope.crearsemana = function () {
    if ($scope.start_date <= $scope.end_date && $scope.start_date != '') {
      valid = true;
      for (var week in $scope.allweeks) {
        if ($scope.start_date > week.start_date && $scope.start_date > week.end_date) {
          $http.get('/controllers/weekly/create_q.php?question='+$scope.question+'&answer1='+$scope.answer1+'&answer2='+$scope.answer2+'&answer3='+$scope.answer3+'&answer4='+$scope.answer4+'&correct='+$scope.correct)
          $scope.start_date = '';
          $scope.end_date = '';
          $mdToast.show($mdToast.simple().textContent('Semana guardada'));
          $http.get('controllers/week/all.php').success(function (data) {
            $scope.allweeks = data;
            console.log(data);
          });
        }else {
          $mdToast.show($mdToast.simple().textContent('Ya hay una semana que cubre algunos días de los registrados'));
        }
      }
    }else{
      $mdToast.show($mdToast.simple().textContent('Fecha no validad'));
    }
  }
});
