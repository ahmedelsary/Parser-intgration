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
        <form ng-submit="addItem()">
            <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Item Title" ng-model="tempItem.title" required="required">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" placeholder="URL" ng-model="tempItem.url" required="required">
                </div>


            <input type="submit" value="Add" class="btn btn-success pull-right"/>
        </form>
    </div>
</div>
    
</div>