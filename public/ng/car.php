
<style>
       .table{
       color: #000;
   }
</style>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{car.producer}}  - {{car.model}}</h3>
            </div>
            <div class="panel-body">
             

                <div class="col-md-12">
                    <a href="{{car.carlink}}" class="thumbnail">
                        <img class="img-responsive" ng-src="{{car.img}}" alt="{{car.producer}} - {{car.model}}"
                             style="width:400px;height:400px">
                    </a>

                </div>
               
                <table class="table">
			<tr>
		            <th>Price</th>
			    <td>{{car.price}}</td>
			</tr>
			<tr>
		            <th>Year</th>
			    <td>{{car.year}}</td>
			</tr>
			<tr>
		            <th>Type</th>
		            <td>{{car.type}}</td>
		        </tr>
			<tr>
		            <th>Gearbox</th>
		            <td>{{car.gearbox}}</td>
		        </tr>

                    
                        <tr ng-show="car.type == 'used'">
				    <th>Owner</th>
				    <td>{{car.owner}}</td>
				</tr>
				<tr ng-show="car.type == 'used'">
				    <th>Contact</th>
				    <td>{{car.contact}}</td>
				</tr>
				<tr ng-show="car.type == 'used'">
				    <th>Date of view</th>
				    <td>{{car.date}}</td>
				</tr>
				<tr ng-show="car.type == 'used'">
				    <th>Notes</th>
				    <td>{{car.notes}}</td>
				</tr>
		      
                        

                        

                    
                </table>
            </div>
            </div>
