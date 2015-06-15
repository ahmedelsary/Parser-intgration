                <!-- search -->
                
<style type="text/css">
.styled-select select {
   background: transparent;
   width: 215px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
   
   .styled-select {
   width: 200px;
   height: 34px;
   overflow: hidden;
   background: #26292E;
   border: 1px solid #ccc;
   border-color: #26292E;
   }
   
</style>
<div style="margin-top:50px;">
<div class="span3" >
    
    <input type="radio" value="simple" ng-model="searchtype" /> Simple Search &nbsp;&nbsp;&nbsp;
    <input type="radio" value="adv" ng-model="searchtype" /> Advanced Search 
    <br />
    <br />
    <br />
    
    <div ng-show="searchtype == 'simple'">
        <form class="form-inline" ng-submit="simpleSearch()">
        <div class="form-group">
            <div class="col-xs-12">
                <label>Search</label><br />
                <input required="required" type="text" class="form-control" id="keyword" name="keyword" ng-model="formData.keyword" placeholder="enter keyword to search"  style="height:34px;width:185px;background: #26292E; border-color:#26292E;">
                <input type="submit" value="search" name="sub" class="submit"  style="height:34px;width:50px;background: #26292E; border-color:#26292E;">
            </div>
          
            
            <div class="col-xs-12">
                <input type="checkbox" name="now" ng-model="formData.now">
             <label class="nn"> Get fresh data </label> 
            </div>
            
           
            
        </div>
    </form>
        </div>
    <div style="margin-left:30px;" ng-show="searchtype == 'adv'">
        <!--<a class="btn" data-toggle="collapse" data-target="#advanced" >Search</a>--> 
    
        <div  style="height:45px;width:150px;background: #26292E; border-color:#26292E;padding-top: 7px;" class="text-center">
             <h6>Advanced Search:</h6>
         </div><br/>
        
        <div id="advanced" class="collapse in">
            <form class="form-inline" ng-submit="advSearch()">

        <div class="form-group styled-select" >

            <select class="styled-select" name="mark" ng-model="formData.mark" id="mark" >
                <option ng-repeat="mark in marks" value="{{mark.producer}}" ng-selected="formData.mark == mark.producer">{{mark.producer}}</option>
            </select>
        </div> <br/><br/>
        
        <div class="form-group styled-select">
            
            <select class=" styled-select" name="model" id="model" ng-model="formData.model">
                <option ng-repeat="model in models" value="{{model.model}}" ng-selected="formData.model == model.model">{{model.model}}</option>
           
            </select>
            

        </div><br/><br/>
        
         <div class="form-group styled-select" >

            <select class="styled-select" name="mark" id="mark" ng-model="formData.type" >
                <option value="" >Select Car Type</option>
                <option value="used">Used</option>
                <option value="new">New</option>
                 </select>
        </div> <br/><br/>

        <div class="form-group">

            <label class="sr-only" for="minyear">year from</label>

            <input type="text" ng-model="formData.minyear" name="minyear" class="form-control" id="minyear" placeholder="year from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxyear">year to</label>

            <input type="text" name="maxyear" ng-model="formData.maxyear" class="form-control" id="maxyear" placeholder="year to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        
        <div class="form-group">

            <label class="sr-only" for="minprice">price from</label>

            <input type="text" name="minprice" ng-model="formData.minprice" class="form-control" id="minprice" placeholder="price from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxprice">price to</label>

            <input type="text" name="maxprice" ng-model="formData.maxprice" class="form-control" id="maxprice" placeholder="price to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        
         <div class="form-group">

            <label class="sr-only" for="mincapacity">capacity from</label>

            <input type="text" name="mincapacity" ng-model="formData.mincapacity" class="form-control" id="mincapacity" placeholder="capacity from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxcapacity" >capacity to</label>

            <input type="text" name="maxcapacity" ng-model="formData.maxcapacity" class="form-control" id="maxcapacity" placeholder="capacity to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>



        <input type="submit" value="search" name="sub" class="" style="height:34px;width:100px;background: #26292E; border-color:#26292E;">

    </form>

</div>
</div>     
</div>
         <div class="container">
            <div class="row"> 
             <div class="span8">
            
   
               <div class="col-md-4" ng-repeat="car in cars">
        <div class="panel ">
            <div class="panel-heading"style="background: #26292E;border-color:#26292E;border: 15px; ">
                <h3 class="panel-title">{{car.producer}} - {{car.model}} - {{car.year}}</h3>
            </div>
            <div class="panel-body" >
             

                <div class="col-md-12">
                         <a ng-href="index.php/Car/ViewCar?id={{car.id}}" class="thumbnail">
                        <img class="img-responsive" ng-src="{{car.img}}" alt="{{car.producer}} - {{car.model}}"
                             style="width:150px;height:150px">
                    </a>

                </div>
               
                <table class="table">
                    <th>Price</th>
                    <th>Type</th>
                
                    <tr>

                        <td> {{car.price}} </td>

                        <td> {{car.type}} </td>

                    </tr>
                </table>
            </div>
            </div>
</div>
        
         
          



<!--            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Error</h3>
                </div>
               
               


            </div>-->

                     
        </div>
    </div>  
                    
                </div>
