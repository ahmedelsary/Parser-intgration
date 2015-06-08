
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-success" ng-if="messages">
        <ul>
            <li ng-repeat="message in messages">{{message}}</li>
        </ul>
    </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" ng-submit="login()">
                            <fieldset>
                                <div class="form-group" >
                                    <input class="form-control" placeholder="Email" ng-model="formData.email" type="email" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" ng-model="formData.password" type="password" value="" required="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
