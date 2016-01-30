// JavaScript Document

$(document).ready(function() {
		$(".fancybox")
		.attr('rel', 'gallery')
		.fancybox({
			beforeShow: function() {
				/* add a caption */
				this.title =  this.title + " - " + $(this.element).data("caption");
				
				/* disable right click */
				$.fancybox.wrap.bind("contextmenu", function (e) {
					return false;
				});
			},
			
			/* title position */
			helpers : {
				title: {
					type: 'inside',
				}
			}
		});
		
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
	});
});