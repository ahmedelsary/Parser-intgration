

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
        when('/logout', {
        templateUrl: 'public/ng/login.php',
        controller: 'logoutCtrl'
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
        when('/car/:car_id', {
        templateUrl: 'public/ng/car.php',
        controller: 'carCtrl'
      }).
      otherwise({
        redirectTo: '/',
      });
  });



myApp.controller('newsCtrl', function ($scope,$http){
    
    $scope.news_filter = 'all';
    
    $scope.changeFilter = function(filter){
        $scope.news_filter = filter;

    }
    $http.get('news/view').success(function(data) {

              if (data['code'] != 'success') {
                  $scope.message = "Error";
              } else {
                $scope.news = data['items'];
              }
            });
            
    $http.get('events/view').success(function(data) {
     

              if (data['code'] != 'success') {
                  $scope.message = "Error";
              } else {
                $scope.events = data['items'];
                console.log(data);
              }
            });
            
    $scope.displayNews = function (index){
        $scope.current = $scope.news[index];
    }
    
    $scope.displayEvent = function (index){
        $scope.current = $scope.events[index];
    }
});

myApp.controller('carCtrl', function ($scope,$http,$routeParams){
    $http.get('car/viewcar?id='+$routeParams.car_id).success(function(data) {
                $scope.car = data['car'];
              
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

myApp.controller('loginCtrl', function ($scope, $location, $http,user,$rootScope){
    
    
    $scope.formData = {};
    
    $scope.login = function (){
        $http({
            method  : 'POST',
            url     : 'user/login',
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
                user.get(function(data) {
                  if (data['code'] == 'success') {
                      $rootScope.user =  data['user'];

                  } else if (data['code'] == 'error'){
                      $rootScope.user =  null;

                  }
              });
                $location.path('/');
              }
            });
    }
});

myApp.controller('regCtrl', function ($scope, $http,$location){
    $scope.formData = {};
    
    $scope.reg = function (){
        $http({
            method  : 'POST',
            url     : 'user/register',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  $scope.message = data.msgs;
                  
              } else {
                  $scope.message = 'User Added';
                  $location.path('/login');
              }
            });
    }
});


myApp.factory('user', function($http){
    
   return {
          get: function(callback){
            $http.get('user/usersget').success(callback);
          }
        }; 
    
});

myApp.controller('menuCtrl', function ($scope, $http, user, $rootScope){
    user.get(function(data) {
              if (data['code'] == 'success') {
                  $rootScope.user =  data['user'];
                  
              } else if (data['code'] == 'error'){
                  $rootScope.user =  null;
                
              }
          });
              
              
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
    
    $http.get('search/getmark').success(function(data){

       $scope.marks = data['items'];
       $scope.formData.mark = $scope.marks[0].producer;
    });
    
    $scope.$watch('formData.mark',function (){
        console.log($.param({'mark':$scope.formData.mark}));
        $http.get('search/getmodels',{params:{'mark':$scope.formData.mark}})
            .success(function(data) {
               
              $scope.models = data['items'];
              $scope.formData.model = $scope.models[0].model;
            });
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
            url     : 'search/advancedsearch',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              $scope.cars = data['items'];
            });
    };
    

});


myApp.controller('logoutCtrl', function($scope,$http,$location,$rootScope) {
        $http.get('user/logout')
            .success(function(data) {
                console.log(data);
              if (data['code'] == 'loggedout') {
                 $scope.messages = ['User Loggedout Successfully'];
                 $scope.$parent.is_loggedin = false;
                 $rootScope.user = null;
                 
                 $location.path('/login');
                 
                  
              } else {
                $scope.messages = data.msgs;
                 
              }
            });


});