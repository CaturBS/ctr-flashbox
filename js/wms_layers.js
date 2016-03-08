var sourceDasar = new ol.source.TileWMS({
	url: url,
	params: {
		LAYERS: 'laut,pulau,batas_wilayah,batas_wilayah_medan,wilayah_hijau,sungai'
	}
});

var layerDasar = new ol.layer.Tile({
	source: sourceDasar
});