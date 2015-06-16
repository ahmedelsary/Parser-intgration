
app.controller('listUsersCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List Users';
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'user/deleteuser',
            data    : $.param({'user_id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateUsers($http,$scope,$location);
            });
    };
    
    
    $scope.edit = function(index){
        $scope.tempUser = $scope.users[index];
    };
    
    
    $scope.saveUser = function(){
        console.log($scope.tempUser);
        $http({
            method  : 'POST',
            url     : 'user/updateuser',
            data    : $.param($scope.tempUser),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateUsers($http,$scope,$location);
            });
    };
    
    updateUsers($http,$scope,$location);
//    registerDataTable();
});


app.controller('addUserCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add User';
    
    $scope.addUser = function (){
        $http({
            method  : 'POST',
            url     : 'user/register',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['User Added Successfully'];
                $scope.formData = {};
              }
            });
        };

});


//
//function registerDataTable(){
//    $(document).ready(function() {
//        $('#dataTables-example').DataTable({
//                responsive: true
//        });
//    });
//}


function updateUsers(http, scope,location){
    CheckUser(scope,http,location);
    
    http.get('user/listusers').success(function(data) {
              console.log(data);
              next = location.path();
              
              if (data['code'] == 'success') {
                  scope.users = data['users'];

                  for (var i =0 ; i< scope.users.length; i++){
                      scope.users[i].banned = (scope.users[i].banned == "1");

                  }
                  
              } else if (data['code'] === 'not_loggedin'){
                  location.path('/login').search('next',next)
                
              }
               else if (data['code'] === 'not_admin'){
                  location.path('/login').search('msg','You are not admin')
              }
            });
}

app.controller('loginCtrl', function($scope,$http,$location) {
    $scope.$parent.is_loggedin = false;
    
    $scope.messages = [$location.search()['msg']];
    
    $scope.login = function(){
        $http({
            method  : 'POST',
            url     : 'user/login',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);
              
              
              if (data['code'] == 'success') {
                 $scope.messages = ['User Loggedin Successfully'];
                 $scope.$parent.is_loggedin = true;
                 $location.path(next)
                  
              } else {
                $scope.messages = data.msgs;
                 
              }
            });
        };

});


app.controller('logoutCtrl', function($scope,$http,$location) {
        $http.get('user/logout')
            .success(function(data) {
              console.log(data);

              if (data['code'] == 'loggedout') {
                 $scope.messages = ['User Loggedout Successfully'];
                 $scope.$parent.is_loggedin = false;
                 
                 $location.path('/login');
                 
                  
              } else {
                $scope.messages = data.msgs;
                 
              }
            });


});