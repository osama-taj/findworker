/*! Theia Sticky Sidebar | v1.7.0 - https://github.com/WeCodePixels/theia-sticky-sidebar */
!function(i){i.fn.theiaStickySidebar=function(t){function e(t,e){return!0===t.initialized||!(i("body").width()<t.minWidth)&&(function(t,e){t.initialized=!0,0===i("#theia-sticky-sidebar-stylesheet-"+t.namespace).length&&i("head").append(i('<style id="theia-sticky-sidebar-stylesheet-'+t.namespace+'">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));e.each((function(){var e={};if(e.sidebar=i(this),e.options=t||{},e.container=i(e.options.containerSelector),0==e.container.length&&(e.container=e.sidebar.parent()),e.sidebar.parents().css("-webkit-transform","none"),e.sidebar.css({position:e.options.defaultPosition,overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"}),e.stickySidebar=e.sidebar.find(".theiaStickySidebar"),0==e.stickySidebar.length){var a=/(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;e.sidebar.find("script").filter((function(i,t){return 0===t.type.length||t.type.match(a)})).remove(),e.stickySidebar=i("<div>").addClass("theiaStickySidebar").append(e.sidebar.children()),e.sidebar.append(e.stickySidebar)}e.marginBottom=parseInt(e.sidebar.css("margin-bottom")),e.paddingTop=parseInt(e.sidebar.css("padding-top")),e.paddingBottom=parseInt(e.sidebar.css("padding-bottom"));var n=e.stickySidebar.offset().top,s=e.stickySidebar.outerHeight();function r(){try{"none"==i(".leftSidebar .theiaStickySidebar")[0].style.transform?i("#svg-services").width(i("#con-services").width()).css({right:i(".leftSidebar").width()+35+"px"}):i("#svg-services").width(i("#con-services").width()).css({right:i(".leftSidebar").width()+20+"px"})}catch{}e.fixedScrollTop=0,e.sidebar.css({"min-height":"1px"}),e.stickySidebar.css({position:"static",width:"",transform:"none"})}function d(t){var e=t.height();return t.children().each((function(){e=Math.max(e,i(this).height())})),e}e.stickySidebar.css("padding-top",1),e.stickySidebar.css("padding-bottom",1),n-=e.stickySidebar.offset().top,s=e.stickySidebar.outerHeight()-s-n,0==n?(e.stickySidebar.css("padding-top",0),e.stickySidebarPaddingTop=0):e.stickySidebarPaddingTop=1,0==s?(e.stickySidebar.css("padding-bottom",0),e.stickySidebarPaddingBottom=0):e.stickySidebarPaddingBottom=1,e.previousScrollTop=null,e.fixedScrollTop=0,r(),e.onScroll=function(e){if(e.stickySidebar.is(":visible"))if(i("body").width()<e.options.minWidth)r();else{if(e.options.disableOnResponsiveLayouts)if(e.sidebar.outerWidth("none"==e.sidebar.css("float"))+50>e.container.width())return void r();var a=i(document).scrollTop(),n="static";if(a>=e.sidebar.offset().top+(e.paddingTop-e.options.additionalMarginTop)){var s,c=e.paddingTop+t.additionalMarginTop,p=e.paddingBottom+e.marginBottom+t.additionalMarginBottom,b=e.sidebar.offset().top,l=e.sidebar.offset().top+d(e.container),h=0+t.additionalMarginTop;s=e.stickySidebar.outerHeight()+c+p<i(window).height()?h+e.stickySidebar.outerHeight():i(window).height()-e.marginBottom-e.paddingBottom-t.additionalMarginBottom;var f=b-a+e.paddingTop,g=l-a-e.paddingBottom-e.marginBottom,S=e.stickySidebar.offset().top-a,u=e.previousScrollTop-a;"fixed"==e.stickySidebar.css("position")&&"modern"==e.options.sidebarBehavior&&(S+=u),"stick-to-top"==e.options.sidebarBehavior&&(S=t.additionalMarginTop),"stick-to-bottom"==e.options.sidebarBehavior&&(S=s-e.stickySidebar.outerHeight()),S=u>0?Math.min(S,h):Math.max(S,s-e.stickySidebar.outerHeight()),S=Math.max(S,f),S=Math.min(S,g-e.stickySidebar.outerHeight());var y=e.container.height()==e.stickySidebar.outerHeight();n=(y||S!=h)&&(y||S!=s-e.stickySidebar.outerHeight())?a+S-e.sidebar.offset().top-e.paddingTop<=t.additionalMarginTop?"static":"absolute":"fixed"}if("fixed"==n){var m=i(document).scrollLeft();e.stickySidebar.css({position:"fixed",width:o(e.stickySidebar)+"px",transform:"translateY("+S+"px)",left:e.sidebar.offset().left+parseInt(e.sidebar.css("padding-left"))-m+"px",top:"0px"})}else if("absolute"==n){var k={};"absolute"!=e.stickySidebar.css("position")&&(k.position="absolute",k.transform="translateY("+(a+S-e.sidebar.offset().top-e.stickySidebarPaddingTop-e.stickySidebarPaddingBottom)+"px)",k.top="0px"),k.width=o(e.stickySidebar)+"px",k.left="",e.stickySidebar.css(k)}else"static"==n&&r();"static"!=n&&1==e.options.updateSidebarHeight&&e.sidebar.css({"min-height":e.stickySidebar.outerHeight()+e.stickySidebar.offset().top-e.sidebar.offset().top+e.paddingBottom}),e.previousScrollTop=a}},e.onScroll(e),i(document).on("scroll."+e.options.namespace,function(i){return function(){i.onScroll(i)}}(e)),i(window).on("resize."+e.options.namespace,function(i){return function(){i.stickySidebar.css({position:"static"}),i.onScroll(i)}}(e)),"undefined"!=typeof ResizeSensor&&new ResizeSensor(e.stickySidebar[0],function(i){return function(){i.onScroll(i)}}(e))}))}(t,e),!0)}function o(i){var t;try{t=i[0].getBoundingClientRect().width}catch(i){}return void 0===t&&(t=i.width()),t}return(t=i.extend({containerSelector:"",additionalMarginTop:0,additionalMarginBottom:0,updateSidebarHeight:!0,minWidth:0,disableOnResponsiveLayouts:!0,sidebarBehavior:"modern",defaultPosition:"relative",namespace:"TSS"},t)).additionalMarginTop=parseInt(t.additionalMarginTop)||0,t.additionalMarginBottom=parseInt(t.additionalMarginBottom)||0,function(t,o){e(t,o)||(i(document).on("scroll."+t.namespace,function(t,o){return function(a){e(t,o)&&i(this).unbind(a)}}(t,o)),i(window).on("resize."+t.namespace,function(t,o){return function(a){e(t,o)&&i(this).unbind(a)}}(t,o)))}(t,this),this}}(jQuery);