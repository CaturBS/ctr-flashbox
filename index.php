<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web gis medan</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css"></style>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap-treeview.min.css"></style>
		<link rel="stylesheet" type="text/css" href="css/style.css"></style>
		<link rel="stylesheet" type="text/css" href="ol/css/ol.css"></style>
		<script type="text/javascript" src="ol/build/ol.js"></script>
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap-treeview.min.js"></script>
		<script type="text/javascript">
			var map;
			var treeView;
			var url = '<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/";?>' + 'cgi-bin/mapserv.fcgi?map=/wms/medan.map';
		</script>
		<script type="text/javascript" src="js/wms_layers.js"></script>
		<script type="text/javascript" src="js/line_layers.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var layerJalan = new ol.layer.Tile({
					source: new ol.source.TileWMS({
						url: url,
						params:{LAYERS: 'jalan'}
					})
				});
				var layerBatasKecamatan = new ol.layer.Tile({
					source: new ol.source.TileWMS({
						url: url,
						params:{LAYERS: 'kecamatan,pusat_pemerintahan'}
					})
				});
				map = new ol.Map({
					target:'map',
					layers:[layerDasar,layerJalan,layerBatasKecamatan],
					view: new ol.View({
						zoom: 11,
						projection: 'EPSG:4326',
						center: ol.proj.transform([98.67,3.65],'EPSG:4326','EPSG:4326'),
						maxExtent: [98.34,3.5,99,3.79]
					})
				});
		        map.addControl(new ol.control.ScaleLine());
		        map.addControl(new ol.control.ZoomSlider());

		        var treeData = [
        			{
            			text:'dasar',
            			icon:'glyphicon glyphicon-leaf',
            			nodes:[
                   			{text:'batas kecamatan',selectable:false,state:{checked:true}},
                   			{text:'jalan',selectable:false,state:{checked:true}},
                   			//{text:'jalan',selectable:true,state:{checked:true}}
                   		],
            			state:{expanded:false,checked:true,selectable:false}
        			},
        			{
            			text:'infrastruktur',
            			nodes:[{text:'pencarian jalan'}],
            			state:{expanded:false,selectable:false}
        			},
        			{
            			text:'ekonomi',
            			nodes:[{text:'jalan'}],
            			state:{expanded:false,selectable:false}
        			}
        		];
		        $("#tree").treeview({
			        data:treeData,
			        checkedIcon:'glyphicon glyphicon-check',
			        showCheckbox:true,
			        onNodeChecked: function(event, data){
				        switch (data.text) {				        
					        case 'dasar':
						        for (i in data.nodes){
						        	$('#tree').treeview('checkNode', [ data.nodes[i].nodeId]);
						        };
					        	break;
				        	case 'batas kecamatan':	
				        		map.addLayer(layerBatasKecamatan);				        	
					        	break;
				        	case 'jalan':
				        		map.addLayer(layerJalan);
					        	break;
				        	case 'pencarian jalan':
					        	
					        	break;
				        };
			        },
			        onNodeUnchecked: function(event, data){
				        switch (data.text) {
					        case 'dasar':
					        	for (i in data.nodes){
						        	$('#tree').treeview('uncheckNode', [ data.nodes[i].nodeId]);
						        };
					        	break;
				        	case 'batas kecamatan':
				        		map.removeLayer(layerBatasKecamatan);
					        	break;
				        	case 'jalan':
				        		map.removeLayer(layerJalan);
					        	break;
				        };				        
			        }
		        });
		        //$("#tree").treeview('showCheckbox',true);
			});
		</script>
	</head>
	<body class="bodya">
		<div class="navbar navbar-spec">
			<div class="container-fluid">
				<div class="navbar-header">
					<img alt="" src="images/logo-2.png">
					<a class="navbar-brand" href="#">Web Gis</a>
				</div>
			</div>
		</div>
		<div class="wrap" style="margin-top: -10px;">
			<div class="col-sm-9">
				<div style="margin-top: 0;background-color: #dfdfff;padding:1px;margin-left:1px;margin-right:1px;">
					<div id="map" style="background-color: white;border: 1px solid #ccf;box-shadow:3px 3px 10px #ccc;width:100%;" class="compA"></div>
				</div>
			</div>
			<div class="col-sm-3">
				<div style="background-color: #dfdfff;width: 100%;height: 100%;margin-right:1px;padding:1px;box-shadow:3px 3px 10px #ccc;">
					<div style="background-color: white;width: 100%;" class="compA">
						<ul class="nav nav-tabs" role="tab-list">
							<li role="presentation" class="active"><a href="#layer" aria-controls="layer" role="tab" data-toggle="tab">Layer</a></li>		
							<li role="presentation"><a href="#legend" aria-controls="legend" role="tab" data-toggle="tab">Legend</a></li>				
						</ul>
						<div class="tab-content">
							<div role="tab-panel" class="tab-pane active" id="layer" style="padding:1em;">
								layer-layer
								<div id="tree"></div>
							</div>
							<div role="tab-panel" class="tab-pane" id="legend" style="padding:1em;">
								legenndd
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>