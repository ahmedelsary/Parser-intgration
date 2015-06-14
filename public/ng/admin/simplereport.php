
<div  id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{page_title}}
            
        </h1>
        <input type="radio" value="simple" ng-model="type" /> Simple Search Report <br />
        <input type="radio" value="most" ng-model="type" /> Most Viewed Report <br />
    </div>
    <!-- /.col-lg-12 -->
</div>
    
    
<div class="row">
    
    <div class="alert alert-success" ng-if="messages">
        <ul>
            <li ng-repeat="message in messages">{{message}}</li>
        </ul>
    </div>
    
        <div class="col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2 well">
           
            <div>
                <form class="form-horizontal" ng-submit="getReport()">
                    
                    <label for="website" class="control-label ">{{report_type}}</label><br>
                    <input type="radio" ng-model="formData.type" value="Top" checked>Top 20
                    <br>
                    <input type="radio" ng-model="formData.type" value="Dayly">Dayly
                    <br>
                    <input type="radio" ng-model="formData.type" value="Weekly">Weekly
                    <br>
                    <input type="radio" ng-model="formData.type" value="Monthly">Monthly
                    <br>
                    <input type="radio" ng-model="formData.type" value="Yearly">Yearly
			     
		
        
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
            <input type="submit" value="Search" class="form-control btn btn-info" />
            </div>
        </div>
    </form>
</div>
            
       
            
            
            
    </div>
    
</div>
 
    <div class="well" ng-if="results">
        <div ng-show="results.length">
        <input type="submit" value="Print PDF" class=" btn btn-info" ng-click="printPDF(results)" />
        <input type="submit" value="Print CSV" class="btn btn-info" ng-click="printCSV(results)" />

    <br />
        <table class="table">
            <tr>
                    <th>{{header}}</th>
                    <th>Times of search</th>
            </tr>    
            <tr ng-repeat="r in results">
                <td>{{r[header]}}</td>
                <td>{{r.count}}</td>
            </tr>

	</table>
        </div>
    <div class="alert alert-danger" ng-hide="results.length">No Results Found </div>

</div>
    
    
</div>