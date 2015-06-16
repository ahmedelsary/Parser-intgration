app.controller('listNewsCtrl', function($scope, $http,$location,$filter) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List News';
    $scope.tempItem = {};
    
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'news/delete',
            data    : $.param({'id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                    updateNews($http,$scope, $filter);
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
            url     : 'news/edit',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateNews($http,$scope,$filter);
            });
    };
    
    updateNews($http,$scope, $filter);
//    registerDataTable();
});






function updateNews(http, scope, filter){
    
    http.get('news/view').success(function(data) {
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





app.controller('addNewsCtrl', function($scope, $http,$location,$filter) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add News';
    
    $scope.tempItem = {};
    $scope.tempItem.date = new Date();
    
    
    $scope.addNews = function (){
        
        format = "yyyy-MM-dd";
        date = $scope.tempItem.date;
        
        $scope.tempItem.date = $filter('date')(date, format)
        
        $http({
            method  : 'POST',
            url     : 'news/add',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['News Added Successfully'];
                $scope.tempItem = {};
              }
            });
        };

});
