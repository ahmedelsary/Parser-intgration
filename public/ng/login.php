
<!-- Login Section -->
<div class="alert alert-success" ng-if="message">
    {{ message }}
</div>
<div id="contact" class="span6">
<div class="container ">
     <!--Title Page--> 
    <div class="row" id="login" > 
        <div class="span6">
            <div class="">
                <h1 class="span6">Log in</h1>
                <h6 class="span6">Enjoy  Our Web Site.</h6>
                
            </div>
        </div>
    </div>
     <!--End Title Page--> 
    
     <!--Login Form--> 
    <div class="row">
    	<div class="span6">
        
        	<form id="contact-form" class="contact-form">
                 <p class="contact-email span3">
            	 <label >Email:</label>
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
                    <a id="contact-submit" class="submit" ng-click="login()">Log in</a>
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
    <!-- End Login Form -->

    
    

