app.controller('listEventsCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List Events';
    
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'events/delete',
            data    : $.param({'id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                    updateEvents($http,$scope);
            });
    };
    
    
    $scope.edit = function(index){
        $scope.tempItem = $scope.items[index];
    };
    
    
    $scope.saveItem = function(){
        $http({
            method  : 'POST',
            url     : 'events/edit',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateEvents($http,$scope);
            });
    };
    
    updateEvents($http,$scope);
//    registerDataTable();
});






function updateEvents(http, scope){
    
    http.get('events/view').success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  scope.message = "Error";
              } else {
                scope.items = data['items'];
                console.log(scope.items);
              }
            });
}





app.controller('addEventCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add Event';
    
    $scope.addNews = function (){
        console.log($scope.tempItem);
        $http({
            method  : 'POST',
            url     : 'events/add',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['Event Added Successfully'];
                $scope.tempItem = {};
              }
            });
        };

});
