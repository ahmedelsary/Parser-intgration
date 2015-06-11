<!--  News and Events  Section -->




<div id="work" class="" style="margin-top: 0px;padding-bottom: 50px;">
	<div class="container" id="news">
    	<!-- Title Page -->
        <div class="row" style="margin-top: 0px;" >
            <div class="span12" style="margin-bottom: 50px;">
                <h3 class="text-center">Our News and Events</h3>
            </div>
        </div>
        <!-- End Title Page -->
        <div class="row" style="margin-bottom: 30px;">
            <div class="span2"></div>
            <div class="span2 input-group">
                <label>Search</label><br />
                <input type="search"  style="height:34px;width:200px;background: #26292E; border-color:#26292E;" placeholder="search"/>
                <span class="input-group-btn" >
                    <button class="btn btn-default" type="submit" style="height:34px;margin-top: 18px; background: #26292E; border-color:#26292E; border-top-width: 1px;border-bottom-width: 3px;"><i class="glyphicon glyphicon-search"></i></button>
            </span>
            </div>

        </div>
        
        <!-- Portfolio  -->
        <div class="row">
        	<div class="span2">
            	<!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                      
                        <li><a href="#filter" data-option-value="*" class="selected">All Categories</a></li>
                        <li><a href="#/search" style="height:34px;width:170px;background: #26292E; border-color:#26292E;" class="btn">search for cars</a>
</li>
                        
                          <li>
                             <div class=" pull-left">

                                <div class="">
                                    <label for="dtp_input1" class="">Events</label>
                                    <div class="input-group date form_datetime " data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                        <input class=" contact-form" size="" type="text" value="" style="height:30px;width:150px;background: #26292E; border-color:#26292E; " readonly>
                                       
                                        <span class="input-group-addon" style="height: 30px;background: #26292E;border-color:#26292E;padding-bottom: 15px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;"><span class="glyphicon glyphicon-th" style="height: 21px;background: #26292E;"></span></span>
                                    </div>
                                                <input type="hidden" id="dtp_input1" value="" /><br/>
                                </div>
                            </div>
                        </li>
                         <li><a href="#filter" data-option-value=".photography">Show all Events</a></li>
                        <li><a href="#filter" data-option-value=".design">News</a></li>
                        <li><a href="#filter" data-option-value=".video">Video</a></li>
           
                    </ul>
                </nav>
                <!-- End Filter -->
                <!-- calender -->
               
                <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
                </div>
                <!-- end calender-->
            <div class="span9">
            	<div class="row">
                	<section id="projects">
                    	<ul id="thumbs">
                        
							<!-- Item  and Filter Name -->
                        	<li class="item-thumbs span3 design">
                                    
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a id="btn-open" class="hover-wrap fancybox external" data-fancybox-group="gallery" title=""
                                   href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                               
                                <img src="public/ng/img/work/thumbs/image-01.jpg"
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                     Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis."/>
                            </li>
                        	<!-- End Item  -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a  class="hover-wrap fancybox" data-fancybox-group="gallery" title="" 
                                   href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-02.jpg" 
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                     Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" 
                                   title="" href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-03.jpg" 
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                     Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 video">
                            	<!-- Fancybox Media - Gallery Enabled - Title - Link to Video -->
                            	<a class="hover-wrap fancybox-media" data-fancybox-group="video" 
                                   title="Video Content " href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-08.jpg"
                                     alt="Video">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title=""
                                   href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-04.jpg" 
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                     Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" 
                                   href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-05.jpg" 
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 video">
                            	<!-- Fancybox Media - Gallery Enabled - Title - Link to Video -->
                            	<a class="hover-wrap fancybox-media" data-fancybox-group="video" 
                                   title="Video Content" href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                       
                                <img src="public/ng/img/work/thumbs/image-09.jpg"
                                     alt="Video">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery"
                                   title="" href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-06.jpg"
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                     Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                            
							<!-- Item and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="#/news">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb fa fa-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="public/ng/img/work/thumbs/image-07.jpg"
                                     alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item -->
                        </ul>
                    </section>
                    
            	</div>
            </div>
                

 
    </div> 
    
</div>
                
        </div>
        <!-- End Portfolio -->
    </div>
</div>
<!-- End  News and Events Section -->

<style>
#popup-content { display:none; text-align:center}
</style>

<div class="jquery-script-ads" style="margin:0px auto;"><script type="text/javascript">
 <!--
google_ad_client = "ca-pub-2783044520727903";

google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
$(document).ready(function(){

		
	$('#btn-open').click(function(){	

		$.basicpopup({
                    
			content: $('#popup-content').html()
		});
		
	});

});
</script>
</div>
<div id="popup-content" >
    <img src="public/ng/img/work/thumbs/image-05.jpg" 
    alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. ">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce libero velit, dictum eget ligula scelerisque, elementum venenatis purus. Phasellus placerat tempor velit id ultricies. Vivamus sollicitudin, dui non imperdiet maximus, tortor lorem interdum lectus.</p>
</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



