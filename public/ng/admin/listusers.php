
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                
            </div>
            <div class="modal-body">
                
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username" ng-model="tempUser.name" required="required">
                </div>
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" placeholder="E-Mail" ng-model="tempUser.email">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="checkbox" ng-model="tempUser.banned"> Banned
                    </label>
                    
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="checkbox" ng-model="tempUser.is_admin"> Admin
                    </label>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="saveUser()" data-dismiss="modal">Save changes</button>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Banned</th>
                        <th>Admin</th>
                        <th  colspan="2" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="user in users">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.banned == 0 ? "False" : "True"}}</td>
                        <td>{{user.is_admin }}</td>
                        <td class="text-center">
                            <a href ng-click="delete(user.id)" />
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