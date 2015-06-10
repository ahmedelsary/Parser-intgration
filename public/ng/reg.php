
<!-- Reg Section -->
<div class="alert alert-success" ng-if="message">
    {{ message }}
</div>
<div id="contact" class="span6">
    <div class="container ">
     <!--Title Page--> 
     <div class="row" >
        <div class="span6">
            <div class=" span3">
                <h1 class="">Sign up</h1>
            </div>
        </div>
    </div>
     <!--End Title Page--> 
    


     <!--Reg Form--> 
     <div class="row">
    	<div class="span6">
        <!-- hello -->

        <form id="contact-form" class="contact-form" ng-submit="reg()">
                 <p class="contact_name span3">
            	 <label >Full Name:</label>
                 </p>
                <p class="contact-name span3">
            	   <input id="contact_name"  ng-model="formData.username" type="text" placeholder="Full Name" value="" name="username" />
                </p>
                 <p class="contact-email span3">
            	 <label>Email:</label>
                 </p>
                <p class="contact-email span3">
                	<input id="contact_email" type="text"  ng-model="formData.email" placeholder="Email Address" value="" name="email" />
                </p>
                <p class="contact-name span3">
                    <label>Password:</label>
                  </p>
               <p class="contact-name span3 ">
                   <input id="contact_name" type="password"  ng-model="formData.password" placeholder="Password" value="" name="password" />
                </p>
                <p class="contact-submit span6">
       
                    <a id="contact-submit" class="submit" ng-click="reg()">Sign up</a>
                </p>
                
                <div id="response">
                
                </div>
            </form>
         
        </div>
        
        <div class="span3">
        	<div class="contact-details">
                <ul>
                    <li><a href="#"></a></li>
                    <li></li>
                    <li>
                        
                        <br>
                        <br>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- End Reg Form -->

    
    

    <div class="row" style="height: 700px;"> 
        <div class="span9">
            <div class="">
                <h1 class="span9"></h1>
                <h6 class="span9"></h6>
                
            </div>
        </div>
    </div>  