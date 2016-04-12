angular.module("FinalApp",["lumx","ngRoute"])
.config(function($routeProvider){
  $routeProvider
    .when('/',{
      controller: "MainController",
      templateUrl: "templates/home.html"
    })
    .when('/login',{
      controller: "LoginController",
      templateUrl: "templates/login.html"
    })
});
