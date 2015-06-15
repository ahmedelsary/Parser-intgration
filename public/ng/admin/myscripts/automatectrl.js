app.controller('automateCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    $scope.page_title = 'Automate Scrapping';
    
    
    
    getConfig($http,$scope);
    
    
    $scope.updateConfig = function(){
        $http({
            method  : 'POST',
            url     : 'admin1',
            data    : $.param({
                    'car100100': $scope.formData.car100100,
                    'contactcars': $scope.formData.contactcars,
                    'cron': $scope.formData.cron,
                    'day': $scope.formData.day,
                    'day_of_week': $scope.formData.day_of_week,
                    'dubizzle': $scope.formData.dubizzle,
                    'hour': $scope.formData.hour,
                    'minute': $scope.formData.minute,
                    'month': $scope.formData.month
                }),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                console.log(data);
                getConfig($http,$scope);
              $scope.messages = ['Settings Saved'];
            });
    };
    

});

function getConfig($http,$scope){
    $http.get('admin1').success(function(data) {
              
              $scope.formData = [];
              
              items = data['items'];
              time = items[0].split(" ");
              
              $scope.formData.minute = time[0];
              $scope.formData.hour = time[1];
              $scope.formData.day = time[2];
              $scope.formData.month = time[3];
              $scope.formData.day_of_week = time[4];
              
              
              $scope.formData.car100100 = items[1] == 1;
              $scope.formData.contactcars = items[2] == 1;
              $scope.formData.dubizzle = items[3] == 1;
              
              $scope.formData.cron = items[4] == 1  ;
              
              
              $scope.minutes = [{value:'*', label:'All'}]
              for (var i = 0; i < 60 ; i++){
                  $scope.minutes.push({value:i, label: i});
              }
              
              $scope.hours = [{value:'*', label:'All'}]
              for (var i = 0; i < 24 ; i++){
                  $scope.hours.push({value:i, label: i});
              }
              
              $scope.days = [{value:'*', label:'All'}]
              for (var i = 0; i < 32 ; i++){
                  $scope.days.push({value:i, label: i});
              }
              $scope.months = [{value:'*', label:'All'}]
              for (var i = 0; i < 13 ; i++){
                  $scope.months.push({value:i, label: i});
              }
              $scope.day_week = [{value:'*', label:'All'}]
              for (var i = 0; i < 8 ; i++){
                  $scope.day_week.push({value:i, label: i});
              }
              
            });
}