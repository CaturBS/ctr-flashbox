/*
 * ctrbudisantoso@gmail.com
 * flash box in bottom right windows
 */
var ctrFlashId = 0;
function CtrFlashBox(html,options) {	
	var container = $('<div id="cfb_'+ctrFlashId+'" hidden></div>');
	var cssOptions = {
		position:'fixed',
		margin:'0.25em',
		width:'12em',
		height:'2em',
		right:'2em',
		bottom:'-0.5em',
		padding:'0.5em',
		border: '1px solid #eaa',
		color:'#008000',
		backgroundColor:'#fff',
		zIndex:'102',
		overflowY:'auto',
		boxShadow: '2px 2px 7px #eaa',
		width:'12em',
		height:'3em'
	};
	var fadeInVal = 100;
	var fadeOutVal = 3000;
	if (options != null) {
		for (var key in options){
			if (key == 'fadeIn'){
				fadeInVal = options['fadeIn'];
			} else if (key == 'fadeOut'){
				fadeOutVal = options['fadeOut'];
			} else if (key == 'height'){
				cssOptions['height'] = options['height'],
				cssOptions['bottom'] = '-'+options['height']
			} else {
				cssOptions[key] = options[key]
			}
		}
	};
	container.css(cssOptions);
	var closeButton = $('<button class="ui-state-default ui-corner-all" style="position: absolute;right:0.5em;top:0.25em;cursor: pointer;" onclick="$(\'#cfb_'+ctrFlashId+'\').remove();});"><span class="ui-icon ui-icon-close"></span></button></div>');	
	container.append(closeButton);
	//loading.css("margin":"2em");
	this.content = $('<div ></div>');
	this.content.html(html);
	container.append(this.content);
	$('body').append(container);
	container.fadeIn(fadeInVal).animate({
		bottom:"4em"
	},1000).fadeOut(fadeOutVal, function(){
		$('#cfb_'+ctrFlashId).remove();
	});
	this.id = ctrFlashId;
	this.container = container;
	ctrFlashId++;
}

CtrFlashBox.prototype.html = function (data) {
	this.content.html(data);
}

CtrFlashBox.prototype.append = function(obj) {
	this.content.append(obj);
}

CtrFlashBox.prototype.getContent = function () {
	return this.content;
}

CtrFlashBox.prototype.getContainer = function () {
	return this.container;
}

CtrFlashBox.prototype.getId = function () {
	return this.id;
}