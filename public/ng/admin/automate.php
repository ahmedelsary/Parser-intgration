
<div  id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{page_title}}</h1>
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
                <form class="form-horizontal" ng-submit="updateConfig()">
        <div class="form-group">
            <label for="number" class="control-label col-xs-6">Parse Time</label>
            <div class="col-xs-6">
                    <br />
                <div class="form-group">
                    <label>Minutes</label>
                    <select ng-model="formData.minute" required="" class="form-control">
                        <option ng-repeat="m in minutes" value="{{m.value}}" ng-selected="m.value == formData.minute">{{m.label}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hours</label>
                    <select ng-model="formData.hour" required="" class="form-control">
                        <option ng-repeat="h in hours" value="{{h.value}}" ng-selected="h.value == formData.hour">{{h.label}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Days </label>
                    <select ng-model="formData.day" required="" class="form-control">
                        <option ng-repeat="d in days" value="{{d.value}}" ng-selected="d.value == formData.day">{{d.label}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Month </label>
                    <select ng-model="formData.month" required="" class="form-control">
                        <option ng-repeat="m in months" value="{{m.value}}" ng-selected="m.value == formData.month">{{m.label}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Days of the week </label>
                    <select ng-model="formData.day_of_week" required="" class="form-control">
                        <option ng-repeat="d in day_week" value="{{d.value}}" ng-selected="d.value == formData.day_of_week">{{d.label}}</option>
                    </select>
                </div>

        </div>
        </div>

        <div class="form-group">
            <label for="website" class="control-label col-xs-6">Websites</label>
            <div class="col-xs-6">
                <input type="checkbox" ng-model="formData.car100100" class="" id="website" > car100100<br>
                <input type="checkbox" ng-model="formData.contactcars" class="" id="contactcars" > &nbsp; contactcars<br>
                <input type="checkbox" ng-model="formData.dubizzle" class="" id="dubizzle" > &nbsp; dubizzle<br>
            </div>
        </div>

        <div class="form-group">
            <label for="website" class="control-label col-xs-6">start cron job</label>
            <div class="col-xs-6">
                <input type="checkbox" ng-model="formData.cron" class="" id="cron"> &nbsp;<br>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
            <input type="submit" value="save" class="form-control btn btn-info" />
            </div>
        </div>
    </form>
</div>
            
       
            
            
            
    </div>
</div>
    
</div>