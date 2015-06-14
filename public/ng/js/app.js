

var myApp = angular.module('testApp',['ngRoute'])

myApp.config(function($routeProvider) {
    $routeProvider.
      when('/home', {
        templateUrl: 'public/ng/home.php',
        controller: 'homeCtrl'
      }).
      when('/slider', {
        templateUrl: 'public/ng/slider.php',
        controller: 'sliderCtrl'
      }).
      when('/profile', {
        templateUrl: 'public/ng/profile.php',
        controller: 'profileCtrl'
      }).
      when('/login', {
        templateUrl: 'public/ng/login.php',
        controller: 'loginCtrl'
      }).
      when('/reg', {
        templateUrl: 'public/ng/reg.php',
        controller: 'regCtrl'
      }).
        when('/changepass', {
        templateUrl: 'public/ng/changepass.php',
        controller: 'changepassCtrl'
      }).
        when('/news', {
        templateUrl: 'public/ng/news.php',
        controller: 'newsCtrl'
      }).
         when('/contact', {
        templateUrl: 'public/ng/contact.php',
        controller: 'contactCtrl'
      }).
        when('/search', {
        templateUrl: 'public/ng/search.php',
        controller: 'searchCtrl'
      }).
      otherwise({
        redirectTo: '/',
      });
  });
      
myApp.controller('sliderCtrl', function ($scope){
    
});

myApp.controller('homeCtrl', function ($scope){
    
});

myApp.controller('contactCtrl', function ($scope){
    
});

myApp.controller('mainCtrl', function ($scope){
    
});

myApp.controller('profileCtrl', function ($scope, $http){
        $scope.formData = {};
        
         $scope.updateUser = function(){
        console.log($scope.tempUser);
        $http({
            method  : 'POST',
            url     : 'user/updateuser',
            data    : $.param($scope.formData),  
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  
           })

}
    
});

myApp.controller('loginCtrl', function ($scope, $location, $http){
    $scope.formData = {};
    
    $scope.login = function (){
        $http({
            method  : 'POST',
            url     : 'index.php/user/login',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                // if not successful, bind errors to error variables
                $scope.message = data.msgs;
              } else {
                // if successful, bind success message to message
                $location.path('/');
              }
            });
    }
});

myApp.controller('regCtrl', function ($scope, $http){
    $scope.formData = {};
    
    $scope.reg = function (){
        $http({
            method  : 'POST',
            url     : 'index.php/user/register',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  $scope.message = data.msgs;
              } else {
                  $scope.message = 'User Added';
              }
            });
    }
});

myApp.controller('menuCtrl', function ($scope, $http){
    $http.get('menu/view').success(function (data){
        console.log(data);
        $scope.mainMenuItems = data['items'];
    });
});




myApp.controller('mainController', function($scope) {

    $scope.pageClass = 'page-home';

});


myApp.controller('aboutController', function($scope) {

    $scope.pageClass = 'page-about';

});


myApp.controller('contactController', function($scope) {

    $scope.pageClass = 'page-contact';

});



myApp.controller('searchCtrl', function($scope, $http,$location) {

    $scope.searchtype = 'simple';
    $scope.formData = {};
    
    $scope.$watch('searchtype',function (){
       $scope.cars = null; 
    });
    
    $scope.simpleSearch = function(){
        $http({
            method  : 'POST',
            url     : 'search/simplesearch',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                console.log(data);
              $scope.cars = data['items'];
            });
    };
    
    
    $scope.advSearch = function(){
        $http({
            method  : 'POST',
            url     : 'search/simplesearch',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                console.log(data);
              $scope.cars = data['items'];
            });
    };
    

});
