app.controller('listNewsCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'List News';
    
    $scope.delete = function(id){
        $http({
            method  : 'POST',
            url     : 'news/delete',
            data    : $.param({'id': id}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                    updateNews($http,$scope);
            });
    };
    
    
    $scope.edit = function(index){
        $scope.tempItem = $scope.items[index];
    };
    
    
    $scope.saveItem = function(){
        $http({
            method  : 'POST',
            url     : 'news/edit',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              updateNews($http,$scope);
            });
    };
    
    updateNews($http,$scope);
//    registerDataTable();
});






function updateNews(http, scope){
    
    http.get('news/view').success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  scope.message = "Error";
              } else {
                scope.items = data['items'];
                console.log(scope.items);
              }
            });
}





app.controller('addNewsCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Add News';
    
    $scope.addNews = function (){
        console.log($scope.tempItem);
        $http({
            method  : 'POST',
            url     : 'news/add',
            data    : $.param($scope.tempItem),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
              console.log(data);

              if (data['code'] != 'success') {
                  $scope.messages = data.msgs;
              } else {
                $scope.messages = ['News Added Successfully'];
                $scope.tempItem = {};
              }
            });
        };

});
