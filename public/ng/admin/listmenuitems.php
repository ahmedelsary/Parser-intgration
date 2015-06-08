
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Menu Item</h4>
                
            </div>
            <div class="modal-body">
                
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Item Title" ng-model="tempItem.title" required="required">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" placeholder="URL" ng-model="tempItem.url">
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="saveItem()" data-dismiss="modal">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div  id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{page_title}}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th>Title</th>
                        <th>URL</th>
                        
                        <th  colspan="2" class="text-center col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in items">
                        <td>{{item.id}}</td>
                        <td>{{item.title}}</td>
                        <td>{{item.url}}</td>
                        
                        <td class="text-center">
                            <a href ng-click="delete(item.id)" />
                                <i class="fa fa-trash-o fa-2x"> </i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href data-toggle="modal" data-target="#myModal" ng-click="edit($index)"/>
                                <i class="fa fa-edit fa-2x"> </i>
                            </a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->

    </div>
    <!-- /.panel-body -->
</div>

</div>
