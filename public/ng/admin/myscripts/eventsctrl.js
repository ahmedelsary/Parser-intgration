app.controller('listEventsCtrl', function($scope, $http,$location,$filter) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List Events';
    $scope.tempItem = {};
    
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'events/delete',
            data    : $.param({'id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                    updateEvents($http,$scope,$filter);
            });
    };
    
    
    $scope.edit = function(index){
        $scope.tempItem = $scope.items[index];
    };
    
    
    $scope.saveItem = function(){
        
        format = "yyyy-MM-dd";
        date = $scope.tempItem.date;
        
        $scope.tempItem.date = $filter('date')(date, format)
        
          
          
        $http({
            method  : 'POST',
            url     : 'events/edit',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateEvents($http,$scope,$filter);
            });
    };
    
    updateEvents($http,$scope,$filter);
//    registerDataTable();
});






function updateEvents(http, scope,filter){
    
    http.get('events/view').success(function(data) {
        
        format = "yyyy-MM-dd";
             

              if (data['code'] != 'success') {
                  scope.message = "Error";
              } else {
         
                scope.items = data['items'];
                
                for( item in scope.items){
                   
                    scope.items[item].date = new Date(filter('date')(scope.items[item].date.substring(0,10), format))
                }
              }
            });
}





app.controller('addEventCtrl', function($scope, $http,$location,$filter) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add Event';
    $scope.tempItem = {};
    $scope.tempItem.date = new Date();
    
    $scope.addNews = function (){
       format = "yyyy-MM-dd";
        date = $scope.tempItem.date;
        
        $scope.tempItem.date = $filter('date')(date, format)
        console.log($scope.tempItem);
        $http({
            method  : 'POST',
            url     : 'events/add',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
             

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['Event Added Successfully'];
                $scope.tempItem = {};
              }
            });
        };

});
