app.controller('reportCtrl', function($scope, $http,$location) {
    CheckUser($scope,$http,$location);
    
    
    var simple = function(){
        $http({
            method  : 'POST',
            url     : 'search/simplesearchreport',
            data    : $.param({'type': $scope.formData.type}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
        
              $scope.results = data['items'];
            });
    };
    
    var getMostViewed = function(){
        $http({
            method  : 'POST',
            url     : 'search/mostviewreport',
            data    : $.param({'type': $scope.formData.type}),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
                console.log(data);
              $scope.results = data['items'];
            });
    };
    
    $scope.page_title = 'Reports';
    $scope.report_type = "Search Report"
    $scope.type = 'simple';
    $scope.header = 'keyword';
    
    
    $scope.$watch('type',function(){
        $scope.results = null;
        
        if ($scope.type == 'simple'){
            $scope.report_type = "Search Report";
            $scope.getReport = simple;
            $scope.header = 'keyword';
            
        } else {
            $scope.report_type = "Most Viewed Report";
            $scope.getReport = getMostViewed;
            $scope.header = 'car';
        }
    });
    

     $scope.printPDF = function(results){
//           console.log(results);
           
           
           keyword = []
           count = []
           
           for (var i=0; i< results.length ; i++){
               keyword.push(results[i][$scope.header]);
               count.push(results[i].count);
           }
           

        $http({
            method  : 'POST',
            url     : 'search/printpdf',
            data    : $.param({'keyword':keyword,'count':count,'header':$scope.header}),  // pass in data as strings
            responseType: 'arraybuffer',
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
             
        
                var file = new Blob([data], {type: 'application/pdf'});
                var fileURL = URL.createObjectURL(file);
                saveAs(file, 'msSaveBlob_testFile.pdf');

            });
    };
    
    $scope.printCSV = function(results){
           keyword = []
           count = []
           
           for (var i=0; i< results.length ; i++){
               keyword.push(results[i][$scope.header]);
               count.push(results[i].count);
           }
           

        $http({
            method  : 'POST',
            url     : 'search/printcsv',
            data    : $.param({'keyword':keyword,'count':count,'header':$scope.header}),  // pass in data as strings
            responseType: 'arraybuffer',
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
           })
            .success(function(data) {
           
        
                var file = new Blob([data], {type: 'application/csv'});
                var fileURL = URL.createObjectURL(file);
                saveAs(file, 'msSaveBlob_testFile.csv');

            });
    };

});


