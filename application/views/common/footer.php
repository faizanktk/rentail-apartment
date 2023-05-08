<div class="footer-wrapper">
	<div class="container">
		<div class="footer-inner">
			<div class="footer-top">
				<div class="footer-top-left">
					<h2>Real Estate</h2>

					<p>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
					</p>

					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<!--<a href="#"><i class="fa fa-envelope"></i></a>-->
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div><!-- /.social -->									
				</div><!-- /.footer-top-left -->

				<div class="footer-top-right">
					<h2>Subscribe To Newsletter</h2>
					<style>
                    .help-block-error{
                        color:#FF0000;
                    }
                    </style>
					<form method="post" action="" id="subscribetoemailid">
						<div class="input-group">
							<input type="email" name="subscribemail" id="subscribemail" required class="form-control" placeholder="Your e-mail address">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit"  >Subscribe</button>
							</span><!-- /.input-group-btn -->
                            
						</div><!-- /.form-group -->
                        
                         
                         <div id="news-succ" class="alert alert-success alert-dismissable fade in" style="margin-top:2px;border-radius: 5px; display:none">
                            <a href="javascript:void(0)" class="close" onclick="hidefooter('cont-succ')" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Successfully!</strong> subscrib to news.
                          </div>
                          
                          <div id="news-dang" class="alert alert-danger alert-dismissable fade in " style="margin-top:2px;border-radius: 5px; display:none">
                            <a href="javascript:void(0)" class="close" onclick="hidefooter('cont-dang')" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error!</strong> already exists.
                          </div>
                          
					</form>				

					<p>
						* We promise that we will not send you spam messages.
					</p>					
				</div><!-- /.footer-top-right -->
			</div><!-- /.footer-top -->

			<div class="footer-bottom">
				<div class="footer-left">
					&copy; <?php echo date('Y');?>  All Rights reserved.
				</div><!-- /.footer-left -->

				<div class="footer-right">
					<ul class="nav nav-pills">
						<li class="nav-item"><a href="" class="nav-link">Pricing</a></li>
						<li class="nav-item"><a href="<?php echo base_url();?>home/termsandconditions" class="nav-link">Terms &amp; Conditions</a></li>
						<li class="nav-item"><a href="<?php echo base_url();?>contactus" class="nav-link">Contact</a></li>
					</ul>
				</div><!-- /.footer-right -->			
			</div><!-- /.footer-bottom -->
		</div><!-- /.footer-inner -->
	</div><!-- /.container -->
</div><!-- /.footer-wrapper -->
</div><!-- /.page-wrapper -->

<!--<div class="customizer">
	<div class="customizer-content">
		<h2>Color Variant</h2>

		<ul>
			<li><a href="<?php echo base_url();?>assets/css/villareal-turquoise.css" class="background-turquoise"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-orange.css" class="background-orange"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-orange-dark.css" class="background-orange-dark"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-purple.css" class="background-purple"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-cyan.css" class="background-cyan"></a></li>		
			<li><a href="<?php echo base_url();?>assets/css/villareal-teal.css" class="background-teal"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-magenta.css" class="background-magenta"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-green.css" class="background-green"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-green-dark.css" class="background-green-dark"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-red.css" class="background-red"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-brown.css" class="background-brown"></a></li>
			<li><a href="<?php echo base_url();?>assets/css/villareal-blue.css" class="background-blue"></a></li>			
			<li><a href="<?php echo base_url();?>assets/css/villareal-blue-gray.css" class="background-blue-gray"></a></li>			
			<li><a href="<?php echo base_url();?>assets/css/villareal-yellow.css" class="background-yellow"></a></li>						
		</ul>
	</div>--><!-- /.customizer-content -->

	<div class="customizer-title">
		<span><i class="fa fa-cog"></i> Customizer</span>
	</div><!-- /.customizer-title -->
</div><!-- /.customizer -->

<!--<script src="//maps.googleapis.com/maps/api/js" type="text/javascript"></script>-->
<script type="text/javascript">

 var baseurl = '<?php echo base_url();?>';
 

</script>

<script type="text/javascript">
  function hidefooter(classname){
	$('#'+classname).css('display','none')
  }
  </script> 

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/developer.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ezmark.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/tether.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/leaflet.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/leaflet.markercluster.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/libraries/chartist/chartist.min.js"></script> -->
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/scrollPosStyler.js"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/villareal.js"></script>

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

<script>

let mymap = L.map('mapid').setView([51.505, -0.09], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);


</script>

<script type="text/javascript">
	function user_favourits(id,user_id,favourit){
	
	
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"property/user_favourit",
			   data: {id:id,user_id:user_id,favourit:favourit}, 
			   success: function(output){
			   	if(output==1){
					$('#heart_'+id).css('color','red');
					$("#favrit_a_"+id).attr("href", 'javascript:user_favourits('+id+','+user_id+',1)');
					
				}else if(output==0){
			   		$('#heart_'+id).css('color','white');
					$("#favrit_a_"+id).attr("href", 'javascript:user_favourits('+id+','+user_id+',0)');
					
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	} 
	
	
	function user_favouritss(id,user_id,favourit){

	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"property/user_favourit",
			   data: {id:id,user_id:user_id,favourit:favourit}, 
			   success: function(output){
			   	if(output==1){
					$('#hearts_'+id).css('color','red');
					$("#favrits_a_"+id).attr("href", 'javascript:user_favouritss('+id+','+user_id+',1)');
					
				}else if(output==0){
			   		$('#hearts_'+id).css('color','white');
					$("#favrits_a_"+id).attr("href", 'javascript:user_favouritss('+id+','+user_id+',0)');
					
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	} 
//-------------------	
	$("body").on('shown','#link3', function() { 
	  L.Util.requestAnimFrame(map.invalidateSize,map,!1,map._container);
	});	
	
</script>

 <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-multiselect.js"></script>


<script type="text/javascript">
    $('#example-multiple-optgroups').multiselect();

    
</script>

</body>
</html>


 





<!--<script>

var geocoder;
  var map;
  var address ="277 Bedford Avenue, Brooklyn, NY 11211, USA";
     function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(34.397, 150.644);
    var myOptions = {
      zoom: 16,
      center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("loc_map"), myOptions);
    if (geocoder) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

            var infowindow = new google.maps.InfoWindow(
                { content: '<b>'+address+'</b>',
                  size: new google.maps.Size(150,50)
                });

            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            }); 
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

          } else {
            alert("No results found");
          }
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  
	  
	  }
    </script>-->