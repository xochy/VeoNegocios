
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style type="text/css">

	.btncontinuar {
	right:inherit;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  text-shadow: 0px 0px 5px #000000;
  -webkit-box-shadow: 8px 7px 11px #666666;
  -moz-box-shadow: 8px 7px 11px #666666;
  box-shadow: 8px 7px 11px #666666;
  font-family: Courier New;
  color: #ffffff;
  font-size: 33px;
  padding: 6px;
  border: solid #000000 2px;
  text-decoration: none;
}

.btncontinuar:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

.cuerpo{
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,f1f1f1+0,e1e1e1+1,e1e1e1+1,e1e1e1+9,ffffff+15,e1e1e1+42,f6f6f6+100 */
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top, #ffffff 0%, #f1f1f1 0%, #e1e1e1 1%, #e1e1e1 1%, #e1e1e1 9%, #ffffff 15%, #e1e1e1 42%, #f6f6f6 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #ffffff 0%,#f1f1f1 0%,#e1e1e1 1%,#e1e1e1 1%,#e1e1e1 9%,#ffffff 15%,#e1e1e1 42%,#f6f6f6 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #ffffff 0%,#f1f1f1 0%,#e1e1e1 1%,#e1e1e1 1%,#e1e1e1 9%,#ffffff 15%,#e1e1e1 42%,#f6f6f6 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-9 */

}

.divuc{
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b7deed+0,21b4e2+1,21b4e2+13,71ceef+33,0eb5ed+100,b7deed+100,0eb5ed+101 */
		background: #b7deed; /* Old browsers */
		background: -moz-linear-gradient(top, #b7deed 0%, #21b4e2 1%, #21b4e2 13%, #71ceef 33%, #0eb5ed 100%, #b7deed 100%, #0eb5ed 101%); /* FF3.6-15 */
		background: -webkit-linear-gradient(top, #b7deed 0%,#21b4e2 1%,#21b4e2 13%,#71ceef 33%,#0eb5ed 100%,#b7deed 100%,#0eb5ed 101%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to bottom, #b7deed 0%,#21b4e2 1%,#21b4e2 13%,#71ceef 33%,#0eb5ed 100%,#b7deed 100%,#0eb5ed 101%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#0eb5ed',GradientType=0 ); /* IE6-9 */

}

#usr{
	width: 400px;  border-radius: 132px 132px 132px 132px;
						-moz-border-radius: 132px 132px 132px 132px;
						-webkit-border-radius: 132px 132px 132px 132px;
						border: 1px solid #000000; text-align: center;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h3 align="center">
				MODIFICAR UBICACIÓN.
			</h3>

			<form method="post" action="modificando_mapa.php" enctype="multipart/form-data">
			<div class="divuc row"> 
<div class="alert alert-info" role="alert"><center>Coloque la dirección donde se encuentra su negocio</center></div>


	<div class="col-xs-12 col-sm-6 col-md-6">					
	  	<div class="col-xs-12 col-sm-12 col-md-12"   >
	  		<span class="label label-default" >Digite Dirección:</span><br> 
	  		<input  type="text" id="usr" name="direccion" placeholder="Ejemplo: Av. Constitución 1814, Col. Centro, Apatzingán" value="" required><br> 
	  	</div> 
	  	<div class="col-xs-12 col-sm-12 col-md-12"   >
	  		<span  class="label label-default">Digite Referencias:</span><br> 
	  		<input type="text" id="usr" name="referencias" placeholder="Ejemplo: A dos cuadras del Parque Amanecer" value="" required><br>
	  	</div>      
	     <div class="col-xs-12 col-sm-12 col-md-12"   >
	      <span class="label label-default" >Horario:</span><br> 
	      <input  type="text" id="usr" name="horario" placeholder="Ejemplo: 08:00 am - 09:00 pm, Horario Corrido" value="" required><br> 
	    </div> 
 </div>   

	<div class="col-xs-12 col-sm-6 col-md-6" >
	   
	
	   	<label id="msjmarker" class="alert alert-warning">Coloque el Marker donde se encuentra su negocio</label>
	   
	    <style>#map{height: 100% width:100%; }</style>

	         <div  id="map" style="width: 400px; height:400px; "></div>
	   
	</div>
<div id="inputcoor" class="col-xs-12 col-sm-12 col-md-12" >
   <center>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRs1LSFxl7j1LCaiOU_CNO3r5N0PTxCY4&callback=initMap" async defer >
    </script>

     <label>CoordenadaX</label>
    <input id="cordenadax" name="x" class="form-control"  type="text" required>
    <label>CoordenadaY</label>
    <input id="cordenaday" name="y" class="form-control"  type="text" required>
 </div>

    <script type="text/javascript" >




function getCoords(marker){ 
    document.getElementById("cordenadax").value='Latitud: '+marker.getPosition().lat(); 
      document.getElementById("cordenaday").value='Longitud: '+marker.getPosition().lng(); 
} 
function initMap() { 

		 var myLatlng = new google.maps.LatLng(19.012639157637697,-102.20382788828124); 
	
		//var myLatlng = new google.maps.LatLng(19.086954408214268,-102.35454657724608); 
	
    
    var myOptions = { 
        zoom: 13, 
        center: myLatlng,   
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: true,
        mapTypeControl: false
    } 
    var map = new google.maps.Map(document.getElementById("map"), myOptions); 
     
   marker = new google.maps.Marker({ 
          position: myLatlng, 
          draggable: true, 
          title:"Hello World!" 
    }); 
    google.maps.event.addListener(marker, "dragend", function() { 
                    getCoords(marker); 
    }); 
     
      marker.setMap(map); 
    getCoords(marker); 
   
  } 

    </script>
  

   </div>
   <center><button type="submit" class="btn btn-primary">
					Guardar Modificacion
					</button></center>
					<input type="hidden" name="usuario" value="">
					 <input type="hidden" name="contrasena" value="">
			</form>
			<center>
				<form  method="post" action="apartado.php">
					 <button type="submit" class="btn btn-info">
					 Regresar
					 </button>
					 <input type="hidden" name="usuario" value="">
					 <input type="hidden" name="contrasena" value="">
					  <input id="ciudad" name="ciudad" type="hidden" value="">
				</form>
			</center>
				
			
		</div>
	</div>
</div>


</body>
</html>