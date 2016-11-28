# ctr-flashbox
Jquery flash box to show flash box with close button in the bottom right of browser.

Add this line in head of html document before use this library:<br/>
<b>&lt;script type="text/javascript" src="<span style="color:#339833;">path-to-file</span>/ctr-flashbox.js"&gt;&lt;/script&gt;</b>

To use just look in sample below.
<h3>Samples</h3>
sample 1:<br/>
var s = new CtrFlashBox('Wow flashed!!!');

sample 2:<br/>
new CtrFlashBox('Wow flashed!!!&lt;br/&gt;really??', {<br/>
&nbsp;&nbsp;width:'120px', height:'60px', backgroundColor:'black',color:'white',fadeIn:2000, fadeOut:500<br/>
});

Constructor:
function(html,options)

<h3>The list of options:</h3>
<ul>
<li>fadeIn: integer value in ms.</li>
<li>fadeOut: integer value in ms.</li>
<li>Some css tags to change the wrapper of box i.e. box-shadow, width, height, color etc.</li>
</ul>

@copyright: ctrbudisantoso@gmail.com
You can use, modified and distribute this code free. If you  modified it just give recognition that you modified it from my code. If you sell the modified code email me first.
