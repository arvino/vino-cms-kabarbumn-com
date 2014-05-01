/* Java Script Menu Navigasi Vertikal */
var jquerycssmenu_vertical = {
	fadesettings: {
		
		overduration:10,
		
		outduration:10
	},
	buildmenu: function(menuid, arrowsvar) {
		
		jQuery(document).ready(function($) {
										
			var $mainmenu = $("#"+menuid+">ul")
			
			var $headers = $mainmenu.find("ul").parent()
			
			$headers.each(function(i) {
								   
				var $curobj = $(this)
				var $subul = $(this).find('ul:eq(0)')
				
				this._dimensions = {
					
					w:this.offsetWidth,
					
					h:this.offsetHeight,
					
					subulw:$subul.outerWidth(),
					subulh:$subul.outerHeight()
				}
				this.istopheader = $curobj.parents("ul").length == 0 ? true : false
				$subul.css({top:this.istopheader ? this._dimensions.h + "px" : 0})
				$curobj.children("a:eq(0)")
					.css(this.istopheader ? {paddingRight:arrowsvar.right[2]} : {})
					.append('<img src="' + (this.istopheader?arrowsvar.right[1]:arrowsvar.right[1])
						+'" class="'+(this.istopheader ?arrowsvar.right[0]:arrowsvar.right[0])
						+'" style="border:0;" />')
					
				$curobj.hover(function(e) {
									   
					var $targetul = $(this).children("ul:eq(0)")
					
					this._offsets = {left:$(this).offset().left,top:$(this).offset().top}
					
					var menuleft = this.istopheader ? 2 : this._dimensions.w
					
					menuleft = (this._offsets.left+menuleft + this._dimensions.subulw>$(window).width())?(this.istopheader?-this._dimensions.subulw+this._dimensions.w:-this._dimensions.w):menuleft
					
					$targetul.css({left:menuleft+"px"})
					.show()
				},function(e) {
					$(this).children("ul:eq(0)").hide()
				})
			})
			$mainmenu.find("ul").css({display:'none',visibility:'visible'})
		})
	}
}
jquerycssmenu_vertical.buildmenu("menunavigasi_vertikal",arrowimages)