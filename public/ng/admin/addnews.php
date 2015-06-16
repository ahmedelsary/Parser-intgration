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
        <form ng-submit="addNews()">
            <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="News Title" ng-model="tempItem.title" required="required">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="News Description" ng-model="tempItem.description" required="required">
                        
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label>Date</label><br />
                        
                    
                    <div style="display:inline-block; min-height:290px;">
                        <datepicker ng-model="tempItem.date" show-weeks="true" class="well well-sm" custom-class="getDayClass(tempItem.date, mode)"></datepicker>
                    </div>
                </div>


            <input type="submit" value="Add" class="btn btn-success pull-right"/>
        </form>
    </div>
</div>
    
</div>