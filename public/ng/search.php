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

<div class="span3">
    <form class="form-inline" action="" method="post">
        <div class="form-group">
            <div class="col-xs-12">
                <label>Search</label><br />
                <input required="required" type="text" class="form-control" id="keyword" name="keyword" placeholder="enter keyword to search"  style="height:34px;width:185px;background: #26292E; border-color:#26292E;">
                <input type="submit" value="search" name="sub" class="submit"  style="height:34px;width:50px;background: #26292E; border-color:#26292E;">
            </div>
            <div class="col-xs-12">
             <label class="nn">get data from websites now </label> <input type="checkbox" name="now">
            </div>
            
            <div class="col-xs-12">
             <label class="nn">Advanced Search</label> <input type="checkbox" name="now">
            </div>
            
        </div>
    </form>
    <div style="margin-left:30px; margin-top: 70px;">
        <!--<a class="btn" data-toggle="collapse" data-target="#advanced" >Search</a>--> 
        
        <div  style="height:45px;width:150px;background: #26292E; border-color:#26292E;padding-top: 7px;" class="text-center">
             <h6>Advanced Search:</h6>
         </div><br/>
        
        <div id="advanced" class="collapse in">
    <form class="form-inline" method="post">

        <div class="form-group styled-select" >

            <select class="styled-select" name="mark" id="mark" >
                <option value="">Select Car Mark</option>
                 </select>
        </div> <br/><br/>
        
        <div class="form-group styled-select">
            
            <select class=" styled-select" name="model" id="model">
               <option value="">Select Model</option>           
            </select>
            

        </div><br/><br/>
        
         <div class="form-group styled-select" >

            <select class="styled-select" name="mark" id="mark" >
                <option value="">Select Car Type</option>
                <option value="used">Used</option>
                <option value="new">New</option>
                 </select>
        </div> <br/><br/>

        <div class="form-group">

            <label class="sr-only" for="minyear">year from</label>

            <input type="text" name="minyear" class="form-control" id="minyear" placeholder="year from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxyear">year to</label>

            <input type="text" name="maxyear" class="form-control" id="maxyear" placeholder="year to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        
        <div class="form-group">

            <label class="sr-only" for="minprice">price from</label>

            <input type="text" name="minprice" class="form-control" id="minprice" placeholder="price from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxprice">price to</label>

            <input type="text" name="maxprice" class="form-control" id="maxprice" placeholder="price to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        
         <div class="form-group">

            <label class="sr-only" for="mincapacity">capacity from</label>

            <input type="text" name="mincapacity" class="form-control" id="mincapacity" placeholder="capacity from" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>
        <div class="form-group">

            <label class="sr-only" for="maxcapacity">capacity to</label>

            <input type="text" name="maxcapacity" class="form-control" id="maxcapacity" placeholder="capacity to" style="height:34px;width:185px;background: #26292E; border-color:#26292E;">

        </div><br/><br/>



        <input type="submit" value="search" name="sub" class="" style="height:34px;width:100px;background: #26292E; border-color:#26292E;">

    </form>

</div>
</div>     
</div>
                
                <div class="row"> 
        <div class="span9">
            
           <div class="container">
   
     <div class="col-md-4">
        <div class="panel ">
            <div class="panel-heading"style="background: #26292E;border-color:#26292E;border: 15px; ">
                <h3 class="panel-title">title</h3>
            </div>
            <div class="panel-body" >
             

                <div class="col-md-12">
                        <img class="img-responsive" src="public/ng/img/work/thumbs/image-02.jpg" alt="producer"
                             style="width:150px;height:150px">
                    </a>

                </div>
               
                <table class="table">
                    <th>Price</th>
                    <th>Year</th>
                    <th>Type</th>
                
                    <tr>

                        <td>price</td>
                        <td>year</td>

                        <td>type</td>

                    </tr>
                </table>
            </div>
            </div>
</div>
        

        <div class="col-md-4">
        <div class="panel ">
            <div class="panel-heading"style="background: #26292E;border-color:#26292E;border: 15px; ">
                <h3 class="panel-title">title</h3>
            </div>
            <div class="panel-body" >
             

                <div class="col-md-12">
                        <img class="img-responsive" src="public/ng/img/work/thumbs/image-02.jpg" alt="producer"
                             style="width:150px;height:150px">
                    </a>

                </div>
               
                <table class="table">
                    <th>Price</th>
                    <th>Year</th>
                    <th>Type</th>
                
                    <tr>

                        <td>price</td>
                        <td>year</td>

                        <td>type</td>

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