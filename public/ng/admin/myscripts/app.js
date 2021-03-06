

var app = angular.module('adminApp', [ 'ngRoute', 'ui.bootstrap' ]); 




app.config(function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'public/ng/admin/home.php',
        controller: 'homeCtrl'
      }).
      when('/listusers', {
        templateUrl: 'public/ng/admin/listusers.php',
        controller: 'listUsersCtrl'
      }).
      when('/adduser', {
        templateUrl: 'public/ng/admin/adduser.php',
        controller: 'addUserCtrl'
      }).
      when('/listmenuitems', {
        templateUrl: 'public/ng/admin/listmenuitems.php',
        controller: 'listMenuItemsCtrl'
      }).
      when('/addmenuitem', {
        templateUrl: 'public/ng/admin/addmenuitem.php',
        controller: 'addMenuItemCtrl'
      }).
        when('/listnews', {
        templateUrl: 'public/ng/admin/listnews.php',
        controller: 'listNewsCtrl'
      }).
       when('/addnews', {
        templateUrl: 'public/ng/admin/addnews.php',
        controller: 'addNewsCtrl'
      }).
       when('/listevents', {
        templateUrl: 'public/ng/admin/listevents.php',
        controller: 'listEventsCtrl'
      }).
       when('/addevent', {
        templateUrl: 'public/ng/admin/addevent.php',
        controller: 'addEventCtrl'
      }).
        when('/automate', {
        templateUrl: 'public/ng/admin/automate.php',
        controller: 'automateCtrl'
      }).
        when('/simplereport', {
        templateUrl: 'public/ng/admin/simplereport.php',
        controller: 'reportCtrl'
      }).
      when('/login', {
        templateUrl: 'public/ng/admin/login.php',
        controller: 'loginCtrl'
      }).
       when('/logout', {
        templateUrl: 'public/ng/admin/login.php',
        controller: 'logoutCtrl',
      }).
      otherwise({
        redirectTo: '/',
      });
  });
      

app.controller('mainCtrl', function($scope, $http,$location) {
    $scope.username = 'Mahmoud A. Mostafa';
    $scope.is_loggedin = false;
    
//    $scope.$watch('is_loggedin', CheckUser($scope,$http,$location));
    
});


app.controller('homeCtrl', function($scope,$http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Main Page';
    
});




function CheckUser(scope,http,location){
    http.get('user/usersget').success(function(data) {
              console.log(data);
              next = location.path();
              
              if (data['code'] == 'success') {
                  scope.user = data['user'];
                  if (! scope.user.is_admin){
                      location.path('/login').search('msg','You are not admin')
                  }
                  else {
                      scope.$parent.is_loggedin = true;
                      location.path(next);
                  }
                  
              } else if (data['code'] == 'error'){
                  location.path('/login').search('next',next)
                
              }
            });
}
