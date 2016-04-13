angular.module("QuestionsApp")
.service('auth',function ($http, $rootScope, $location) {
  this.login = function (user, password) {
    $http.get('/controllers/user/user.php?username='+user+'&password='+password)
    .success(function (data) {
      if (data.status = true) {
        $rootScope.user = {id: data.id, username:data.username, type: data.type};
        $location.path(data.type);
      }else {
        $rootScope.erroru = 'true';
      }
    })
  }
})
