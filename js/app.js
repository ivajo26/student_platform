angular.module("QuestionsApp",["ngMaterial","ngRoute", 'md.data.table'])
.config(function($routeProvider){
  $routeProvider
    .when('/student',{
      controller: "StudentController",
      templateUrl: "templates/student.html"
    })
    .when('/',{
      controller:"LoginController",
      templateUrl: "templates/login.html"
    })
    .when('/teacher',{
      controller: "TeacherController",
      templateUrl: "templates/teacher.html"
    })
}).run( function($rootScope, $location) {

    // register listener to watch route changes
    $rootScope.$on( "$routeChangeStart", function(event, next, current) {
      // if ( $rootScope.loggedUser == null ) {
      //   // no logged user, we should be going to #login
      //   if ( next.templateUrl == "partials/login.html" ) {
      //     // already going to #login, no redirect needed
      //   } else {
      //     // not going to #login, we should redirect now
      //     $location.path( "/login" );
      //   }
      // }
    });
 })
