
app.controller('listMenuItemsCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List Menu Items';
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'menu/delete',
            data    : $.param({'id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateItems($http,$scope);
            });
    };
    
    
    $scope.edit = function(index){
        $scope.tempItem = $scope.items[index];
    };
    
    
    $scope.saveItem = function(){
        $http({
            method  : 'POST',
            url     : 'menu/edit',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateUsers($http,$scope);
            });
    };
    
    updateItems($http,$scope);
//    registerDataTable();
});


app.controller('addMenuItemCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add Menu Item';
    
    $scope.addItem = function (){
        $http({
            method  : 'POST',
            url     : 'menu/add',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['Item Added Successfully'];
                $scope.tempItem = {};
              }
            });
        };

});



function updateItems(http, scope){
    
    http.get('menu/view').success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  scope.message = "Error";
              } else {
                scope.items = data['items'];
              }
            });
}