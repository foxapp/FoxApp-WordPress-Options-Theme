/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// JavaScript Document

window.dtStorage = {};

dtStorage.isRetina	= (window.devicePixelRatio >= 2);
dtStorage.isMobile	= (/(Android|BlackBerry|iPhone|iPod|iPad|Palm|Symbian)/.test(navigator.userAgent));
dtStorage.isAndroid	= (/(Android)/.test(navigator.userAgent));
dtStorage.isiOS		= (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
dtStorage.isiPhone	= (/(iPhone|iPod)/.test(navigator.userAgent));
dtStorage.isiPad	= (/(iPad)/.test(navigator.userAgent));
dtStorage.resizeCounter = 0;
dtStorage.theWidth	= 0;
window.notResponsive = 0;
jQuery(document).ready(function($){
	if( $('#footer > .foot-cont').hasClass('dt-hide-in-mobile') )
		$('.line-footer').addClass('dt-no-bg');
	
	if( !$('#footer > .foot-cont').length )
		$('.line-footer').addClass('dt-no-bg-atall');
});

(function(root,doc,factory){if(typeof define==="function"&&define.amd){define(["jquery"],function($){factory($,root,doc);return $.mobile})}else{factory(root.jQuery,root,doc)}}(this,document,function(jQuery,window,document,undefined){(function($,undefined){var support={touch:"ontouchend"in document};$.mobile=$.mobile||{};$.mobile.support=$.mobile.support||{};$.extend($.support,support);$.extend($.mobile.support,support)}(jQuery));(function($,window,document,undefined){var dataPropertyName="virtualMouseBindings",touchTargetPropertyName="virtualTouchID",virtualEventNames="vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "),touchEventProps="clientX clientY pageX pageY screenX screenY".split(" "),mouseHookProps=$.event.mouseHooks?$.event.mouseHooks.props:[],mouseEventProps=$.event.props.concat(mouseHookProps),activeDocHandlers={},resetTimerID=0,startX=0,startY=0,didScroll=false,clickBlockList=[],blockMouseTriggers=false,blockTouchTriggers=false,eventCaptureSupported="addEventListener"in document,$document=$(document),nextTouchID=1,lastTouchID=0,threshold;$.vmouse={moveDistanceThreshold:10,clickDistanceThreshold:10,resetTimerDuration:1500};function getNativeEvent(event){while(event&&typeof event.originalEvent!=="undefined"){event=event.originalEvent}return event}function createVirtualEvent(event,eventType){var t=event.type,oe,props,ne,prop,ct,touch,i,j,len;event=$.Event(event);event.type=eventType;oe=event.originalEvent;props=$.event.props;if(t.search(/^(mouse|click)/)>-1){props=mouseEventProps}if(oe){for(i=props.length,prop;i;){prop=props[--i];event[prop]=oe[prop]}}if(t.search(/mouse(down|up)|click/)>-1&&!event.which){event.which=1}if(t.search(/^touch/)!==-1){ne=getNativeEvent(oe);t=ne.touches;ct=ne.changedTouches;touch=(t&&t.length)?t[0]:((ct&&ct.length)?ct[0]:undefined);if(touch){for(j=0,len=touchEventProps.length;j<len;j++){prop=touchEventProps[j];event[prop]=touch[prop]}}}return event}function getVirtualBindingFlags(element){var flags={},b,k;while(element){b=$.data(element,dataPropertyName);for(k in b){if(b[k]){flags[k]=flags.hasVirtualBinding=true}}element=element.parentNode}return flags}function getClosestElementWithVirtualBinding(element,eventType){var b;while(element){b=$.data(element,dataPropertyName);if(b&&(!eventType||b[eventType])){return element}element=element.parentNode}return null}function enableTouchBindings(){blockTouchTriggers=false}function disableTouchBindings(){blockTouchTriggers=true}function enableMouseBindings(){lastTouchID=0;clickBlockList.length=0;blockMouseTriggers=false;disableTouchBindings()}function disableMouseBindings(){enableTouchBindings()}function startResetTimer(){clearResetTimer();resetTimerID=setTimeout(function(){resetTimerID=0;enableMouseBindings()},$.vmouse.resetTimerDuration)}function clearResetTimer(){if(resetTimerID){clearTimeout(resetTimerID);resetTimerID=0}}function triggerVirtualEvent(eventType,event,flags){var ve;if((flags&&flags[eventType])||(!flags&&getClosestElementWithVirtualBinding(event.target,eventType))){ve=createVirtualEvent(event,eventType);$(event.target).trigger(ve)}return ve}function mouseEventCallback(event){var touchID=$.data(event.target,touchTargetPropertyName);if(!blockMouseTriggers&&(!lastTouchID||lastTouchID!==touchID)){var ve=triggerVirtualEvent("v"+event.type,event);if(ve){if(ve.isDefaultPrevented()){event.preventDefault()}if(ve.isPropagationStopped()){event.stopPropagation()}if(ve.isImmediatePropagationStopped()){event.stopImmediatePropagation()}}}}function handleTouchStart(event){var touches=getNativeEvent(event).touches,target,flags;if(touches&&touches.length===1){target=event.target;flags=getVirtualBindingFlags(target);if(flags.hasVirtualBinding){lastTouchID=nextTouchID++;$.data(target,touchTargetPropertyName,lastTouchID);clearResetTimer();disableMouseBindings();didScroll=false;var t=getNativeEvent(event).touches[0];startX=t.pageX;startY=t.pageY;triggerVirtualEvent("vmouseover",event,flags);triggerVirtualEvent("vmousedown",event,flags)}}}function handleScroll(event){if(blockTouchTriggers){return}if(!didScroll){triggerVirtualEvent("vmousecancel",event,getVirtualBindingFlags(event.target))}didScroll=true;startResetTimer()}function handleTouchMove(event){if(blockTouchTriggers){return}var t=getNativeEvent(event).touches[0],didCancel=didScroll,moveThreshold=$.vmouse.moveDistanceThreshold,flags=getVirtualBindingFlags(event.target);didScroll=didScroll||(Math.abs(t.pageX-startX)>moveThreshold||Math.abs(t.pageY-startY)>moveThreshold);if(didScroll&&!didCancel){triggerVirtualEvent("vmousecancel",event,flags)}triggerVirtualEvent("vmousemove",event,flags);startResetTimer()}function handleTouchEnd(event){if(blockTouchTriggers){return}disableTouchBindings();var flags=getVirtualBindingFlags(event.target),t;triggerVirtualEvent("vmouseup",event,flags);if(!didScroll){var ve=triggerVirtualEvent("vclick",event,flags);if(ve&&ve.isDefaultPrevented()){t=getNativeEvent(event).changedTouches[0];clickBlockList.push({touchID:lastTouchID,x:t.clientX,y:t.clientY});blockMouseTriggers=true}}triggerVirtualEvent("vmouseout",event,flags);didScroll=false;startResetTimer()}function hasVirtualBindings(ele){var bindings=$.data(ele,dataPropertyName),k;if(bindings){for(k in bindings){if(bindings[k]){return true}}}return false}function dummyMouseHandler(){}function getSpecialEventObject(eventType){var realType=eventType.substr(1);return{setup:function(data,namespace){if(!hasVirtualBindings(this)){$.data(this,dataPropertyName,{})}var bindings=$.data(this,dataPropertyName);bindings[eventType]=true;activeDocHandlers[eventType]=(activeDocHandlers[eventType]||0)+1;if(activeDocHandlers[eventType]===1){$document.bind(realType,mouseEventCallback)}$(this).bind(realType,dummyMouseHandler);if(eventCaptureSupported){activeDocHandlers["touchstart"]=(activeDocHandlers["touchstart"]||0)+1;if(activeDocHandlers["touchstart"]===1){$document.bind("touchstart",handleTouchStart).bind("touchend",handleTouchEnd).bind("touchmove",handleTouchMove).bind("scroll",handleScroll)}}},teardown:function(data,namespace){--activeDocHandlers[eventType];if(!activeDocHandlers[eventType]){$document.unbind(realType,mouseEventCallback)}if(eventCaptureSupported){--activeDocHandlers["touchstart"];if(!activeDocHandlers["touchstart"]){$document.unbind("touchstart",handleTouchStart).unbind("touchmove",handleTouchMove).unbind("touchend",handleTouchEnd).unbind("scroll",handleScroll)}}var $this=$(this),bindings=$.data(this,dataPropertyName);if(bindings){bindings[eventType]=false}$this.unbind(realType,dummyMouseHandler);if(!hasVirtualBindings(this)){$this.removeData(dataPropertyName)}}}}for(var i=0;i<virtualEventNames.length;i++){$.event.special[virtualEventNames[i]]=getSpecialEventObject(virtualEventNames[i])}if(eventCaptureSupported){document.addEventListener("click",function(e){var cnt=clickBlockList.length,target=e.target,x,y,ele,i,o,touchID;if(cnt){x=e.clientX;y=e.clientY;threshold=$.vmouse.clickDistanceThreshold;ele=target;while(ele){for(i=0;i<cnt;i++){o=clickBlockList[i];touchID=0;if((ele===target&&Math.abs(o.x-x)<threshold&&Math.abs(o.y-y)<threshold)||$.data(ele,touchTargetPropertyName)===o.touchID){e.preventDefault();e.stopPropagation();return}}ele=ele.parentNode}}},true)}})(jQuery,window,document);(function($,window,undefined){$.each(("touchstart touchmove touchend "+"tap taphold "+"swipe swipeleft swiperight "+"scrollstart scrollstop").split(" "),function(i,name){$.fn[name]=function(fn){return fn?this.bind(name,fn):this.trigger(name)};if($.attrFn){$.attrFn[name]=true}});var supportTouch=$.mobile.support.touch,scrollEvent="touchmove scroll",touchStartEvent=supportTouch?"touchstart":"mousedown",touchStopEvent=supportTouch?"touchend":"mouseup",touchMoveEvent=supportTouch?"touchmove":"mousemove";function triggerCustomEvent(obj,eventType,event){var originalType=event.type;event.type=eventType;$.event.handle.call(obj,event);event.type=originalType}$.event.special.scrollstart={enabled:true,setup:function(){var thisObject=this,$this=$(thisObject),scrolling,timer;function trigger(event,state){scrolling=state;triggerCustomEvent(thisObject,scrolling?"scrollstart":"scrollstop",event)}$this.bind(scrollEvent,function(event){if(!$.event.special.scrollstart.enabled){return}if(!scrolling){trigger(event,true)}clearTimeout(timer);timer=setTimeout(function(){trigger(event,false)},50)})}};$.event.special.tap={tapholdThreshold:750,setup:function(){var thisObject=this,$this=$(thisObject);$this.bind("vmousedown",function(event){if(event.which&&event.which!==1){return false}var origTarget=event.target,origEvent=event.originalEvent,timer;function clearTapTimer(){clearTimeout(timer)}function clearTapHandlers(){clearTapTimer();$this.unbind("vclick",clickHandler).unbind("vmouseup",clearTapTimer);$(document).unbind("vmousecancel",clearTapHandlers)}function clickHandler(event){clearTapHandlers();if(origTarget===event.target){triggerCustomEvent(thisObject,"tap",event)}}$this.bind("vmouseup",clearTapTimer).bind("vclick",clickHandler);$(document).bind("vmousecancel",clearTapHandlers);timer=setTimeout(function(){triggerCustomEvent(thisObject,"taphold",$.Event("taphold",{target:origTarget}))},$.event.special.tap.tapholdThreshold)})}};$.event.special.swipe={scrollSupressionThreshold:30,durationThreshold:1000,horizontalDistanceThreshold:30,verticalDistanceThreshold:75,setup:function(){var thisObject=this,$this=$(thisObject);$this.bind(touchStartEvent,function(event){var data=event.originalEvent.touches?event.originalEvent.touches[0]:event,start={time:(new Date()).getTime(),coords:[data.pageX,data.pageY],origin:$(event.target)},stop;function moveHandler(event){if(!start){return}var data=event.originalEvent.touches?event.originalEvent.touches[0]:event;stop={time:(new Date()).getTime(),coords:[data.pageX,data.pageY]};if(Math.abs(start.coords[0]-stop.coords[0])>$.event.special.swipe.scrollSupressionThreshold){event.preventDefault()}}$this.bind(touchMoveEvent,moveHandler).one(touchStopEvent,function(event){$this.unbind(touchMoveEvent,moveHandler);if(start&&stop){if(stop.time-start.time<$.event.special.swipe.durationThreshold&&Math.abs(start.coords[0]-stop.coords[0])>$.event.special.swipe.horizontalDistanceThreshold&&Math.abs(start.coords[1]-stop.coords[1])<$.event.special.swipe.verticalDistanceThreshold){start.origin.trigger("swipe").trigger(start.coords[0]>stop.coords[0]?"swipeleft":"swiperight")}}start=stop=undefined})})}};$.each({scrollstop:"scrollstart",taphold:"tap",swipeleft:"swipe",swiperight:"swipe"},function(event,sourceEvent){$.event.special[event]={setup:function(){$(this).bind(sourceEvent,$.noop)}}})})(jQuery,this)}));

//----------------------------------------------------------------------------------------------------------------

//misc
jQuery(document).ready( function($) {
	
	var cache_header  = $('#header');
	//scroll to top on click
    $("#nav-above").find('a').live( 'click', function () {
        if( jQuery(this).hasClass('no-act') )
            return true;
        
        if( jQuery(this).parent().hasClass('act') )
            return true;

        $("html"+( ! $.browser.opera ? ",body" : "")).animate({scrollTop: $("#container").offset().top}, 500);
    });

    $('#footer').find('.widget').each( function(){
        $(this).wrap("<div class='one-fourth'></div>");
    });
	//make wrap for blockquote
	$("blockquote").wrap('<div class="blockquote-bg"><div class="quote-l"><div class="quote-r"></div></div></div>').parent(".blockquote-bg");
	if(cache_header.siblings('.byOne').length){
		cache_header.addClass('for-byOne');
	}
	else{
		cache_header.removeClass('for-byOne');
	}
	//make wrap for images
	$('img.alignleft, .wp-caption img').each(function () {
		$(this).wrap('<div class="img-frame left"></div>')
	});
	$('a.alignleft').each(function () {
		$(this).addClass('img-frame left');
	});
	$('img.alignright').wrap('<div class="img-frame right"></div>');
	//$('img.aligncenter').wrap('<div class="img-frame center"></div>');
	$(' a > img.aligncenter').parent().addClass('aligncenter').wrap('<div class="img-frame center"></div>');
	$('img.alignnone').wrap('<div class="img-frame none"></div>');
	
	$('.widget').each(function(){
		$(this).find('.post:first').addClass('first');
		if( $('.list-carousel .textwidget', this).length ){			
			$(this).addClass('with-carous');					
		}
		else{			
			$(this).removeClass('with-carous');			
		}
	});
	
	$('.videos').each(function(){
		var video_w = $(this).children().attr('width');
		$(this).css({
			width: video_w
		})
	})
/*	$('.map').each(function(){
	var video_w = $(this).children().attr('width');
	var video_h = $(this).children().attr('height');
		$(this).css({
			width: video_w,
			height: video_h
		})
	})*/
	if($('.boxed').length){
		$('#wrap').addClass('wrp-boxe');
	}
	else{
		$('#wrap').removeClass('wrp-boxe')
	}
	
	if($.browser.msie && $.browser.version < 9){
		$('.reviews-t').removeClass('p-r');
	}
	else {
		$('.reviews-t').addClass('p-r');
	}
	
	$('#nav li div ul li a').each(function(){
		var par = $(this).parent();
		$(this).find('.a-inner').detach().appendTo(par);
	})
	
	if (!dtStorage.isMobile) {
		// Search box animation
		$("#top-bg .i-search").on("click", function() {
			$(this).parent().css("width", "110px");
		});
		$("#top-bg .i-search").on("blur", function() {
			$(this).parent().css("width", "50px");
		});
	}

});
//----------------------------------------------------------------------------------------------------------------------------------------------
jQuery(document).ready(function($){
	//Nivo Slider homepage
	$("#slider").each(function(){

		var $this				= $(this),
			autoslideOn			= $(this).attr("data-autoslide_on") || 0,
			autoslideInterval	= $(this).attr("data-autoslide") || 7000;
		
		if(autoslideOn == "0") {
			autoslideOn = false;
		} else if (autoslideOn == "1") {
			autoslideOn = true;
		}

        $(this).nivoSlider({
			autoslide: autoslideOn,
            pauseTime: autoslideInterval,
			effect: 'boxRandom',
			animSpeed: 700,
			boxCols: 6,
			directionNav: false,
			controlNav: true,
			prevText: '',
			nextText: '',
			customNav: true,
			customNavPrev: '.big-slider .nivo-prevNav',
			customNavNext: '.big-slider .nivo-nextNav',
			beforeChange: function(){
				
				$('.grid').delay(100).fadeTo(500, 0.8).delay(200).fadeTo(700, 0);
			},
			afterChange: function(){}
			
		});
		$('.nivoSlider').append('<div class="grid"></div><div class="mask-t"></div>');
		
	});
	//**********************************************************************************************************************************************************************************
	//Nivo Slider widgets
	$(".widget_slider").each(function(){
		var prev_slide = $(this).parents(".widget").find(".navig-small .SliderNamePrev"),
			next_slide = $(this).parents(".widget").find(".navig-small .SliderNameNext");

		var $this				= $(this),
			autoslideOn			= $(this).attr("data-autoslide_on") || 0,
			autoslideInterval	= $(this).attr("data-autoslide") || 7000;
		
		if(autoslideOn == "0") {
			autoslideOn = false;
		} else if (autoslideOn == "1") {
			autoslideOn = true;
		}

        $(this).nivoSlider({
			autoslide: autoslideOn,
            pauseTime: autoslideInterval,
			slices: 4,
			boxCols: 4,
			directionNav: false,
			controlNav: false,
			prevText: '',
			nextText: '',
			customNav: true,
			customNavPrev_w: prev_slide,
			customNavNext_w: next_slide
		});
		$('.widget_slider').append('<div class="mask-t"></div>');
	});
	//****************************************************************************************************************
	
	$(".widget_slider2").each(function(){
		var prev_slide = $(this).parents(".widget").find(".navig-small .SliderNamePrev2"),
			next_slide = $(this).parents(".widget").find(".navig-small .SliderNameNext2");
		var $this				= $(this),
			autoslideOn			= $(this).attr("data-autoslide_on") || 0,
			autoslideInterval	= $(this).attr("data-autoslide") || 7000;
		
		if(autoslideOn == "0") {
			autoslideOn = false;
		} else if (autoslideOn == "1") {
			autoslideOn = true;
		}

        $(this).nivoSlider({
			autoslide: autoslideOn,
            pauseTime: autoslideInterval,
			slices: 4,
			boxCols: 4,
			directionNav: false,
			controlNav: false,
			prevText: '',
			nextText: '',
			customNav: true,
			customNavPrev_w: prev_slide,
			customNavNext_w: next_slide
		});
	});
	//***********************************************************************************************************************
	//Nivo Slider shortcodes
	$(".slider-short").each(function(){
		var prev_slide = $(this).parents(".widget").find(".navig-small .SliderNamePrev"),
			next_slide = $(this).parents(".widget").find(".navig-small .SliderNameNext");	
		var $this				= $(this),
			autoslideOn			= $(this).attr("data-autoslide_on") || 0,
			autoslideInterval	= $(this).attr("data-autoslide") || 7000;
		
		if(autoslideOn == "0") {
			autoslideOn = false;
		} else if (autoslideOn == "1") {
			autoslideOn = true;
		}

        $(this).nivoSlider({
			autoslide: autoslideOn,
            pauseTime: autoslideInterval,
			effect: 'boxRandom',
			animSpeed: 700,
			boxCols: 6,
			directionNav: false,
			controlNav: false,
			prevText: '',
			nextText: '',
			customNav: true,
			customNavPrev: '.shortcode-slide .nivo-prevNav',
			customNavNext: '.shortcode-slide .nivo-nextNav',
			beforeChange: function(){
				$('.grid').delay(100).fadeTo(500, 0.8).delay(200).fadeTo(700, 0);
			},
			afterChange: function(){
			}
		});
	});
	//*****************************************************************************************************************************
	$("#container").find('.slider-short').each(function(){
	
		var prev_slide = $(this).parents(".slider-shprtcode").find(".navig-nivo .nivo-prevNav"),
			next_slide = $(this).parents(".slider-shprtcode").find(".navig-nivo .nivo-nextNav");	
			
		var $this				= $(this),
			autoslideOn			= $(this).attr("data-autoslide_on") || 0,
			autoslideInterval	= $(this).attr("data-autoslide") || 7000;
		
		if(autoslideOn == "0") {
			autoslideOn = false;
		} else if (autoslideOn == "1") {
			autoslideOn = true;
		}

        $(this).nivoSlider({
			autoslide: autoslideOn,
            pauseTime: autoslideInterval,
			effect: 'boxRandom',
			animSpeed: 700,
			boxCols: 6,
			directionNav: false,
			controlNav: false,
			prevText: '',
			nextText: '',
			customNav: true,
			customNavPrev: '.shortcode-slide .nivo-prevNav',
			customNavNext: '.shortcode-slide .nivo-nextNav',
			beforeChange: function(){
				$('.grid').delay(100).fadeTo(500, 0.8).delay(200).fadeTo(700, 0);
			},
			afterChange: function(){
			}
		});
	});
	//*************************************************************************************************************************************
	$("#nav").find('li').each(function () {
		if($(this).children('a').hasClass('act')){
			$(this).addClass('act');
		}
		else{
			$(this).removeClass('act');
		}

		if($(this).children('div').length <= 0) return;

		var menuTimeoutShow = false,
			menuTimeoutHide = false;

		$(this).hover(function() {
			if($(this).next().hasClass('act') && $(this).hasClass('children')){
				$(this).next().addClass('next-hide');
			}else{
				$(this).next().removeClass('next-hide');
			}
			var $this = $(this);
			$this.addClass("is-hovered");
			clearTimeout(menuTimeoutShow);
			clearTimeout(menuTimeoutHide);
			menuTimeoutShow = setTimeout(function() {
				if($this.hasClass("is-hovered")){
					$this.children('.arrows-block').stop(true, true).fadeTo(400, 0);
					$this.children('div').not('.arrows-block').stop(true, true).fadeIn(400);
				}
			}, 350);
		}, 
		function() {			
			$(this).next().removeClass('next-hide');
			var $this = $(this);
			$this.removeClass("is-hovered");
			clearTimeout(menuTimeoutShow);
			clearTimeout(menuTimeoutHide);
			menuTimeoutHide = setTimeout(function() {
				if(!$this.hasClass("is-hovered")){
					$this.children('div').not('.arrows-block').stop(true, true).fadeOut(300);
					$this.children('.arrows-block').stop(true, true).fadeTo(400, 1);
					
				}
			}, 100);
		});		
	});
	
	
	$('#nav > li').append('<div class="arrows-block"><span class="arrows-nav"><i class="one-el"></i></span><span class="arrows-nav-two"><i class="two-el"></i></span></div>');
	$('#nav li div li').append('<div class="arrows-block"><span class="arrows-nav"><i class="one-el"></i></span><i class="two-el"></i></div>');
	
	var $topLogo = (dtStorage.isRetina) ? $(".dt-top-retina-logo") : $("#dt-top-logo");
	$(window).on('resize', function(){
		var	logoHeight	= $topLogo.outerHeight(),
			logoWidth	= $topLogo.outerWidth(),
			headerHeight = $('#header').height();
			
		
		$('#header').css({
			'minHeight': logoHeight + 10,
			'visibility': 'visible'
		});
		if( logoHeight > headerHeight ){
			$('#nav > li > a').css({
				'lineHeight' : logoHeight + 10 + 'px'
			});
			$('#nav > li > .arrows-block').css({
				top: logoHeight + 10 -4
			})
		}else{
			$('#nav > li > a').css({
				'lineHeight' : headerHeight + 'px'
			});
			$('#nav > li > .arrows-block').css({
				top: headerHeight -4
			})
		}
	});
	$("#nav").find('> li').not(".act, .children").each(function() {						
		var $this = $(this);
						
		var overfTimeout = false,
				remCTimeout = false,					
				addCTimeout = false,
				removeTimeout = false;
			$(this).hover(function() {				
				var $this = $(this);
					$this.addClass("is-hovered");
		
					clearTimeout(remCTimeout);
					//clearTimeout(addCTimeout);
					
					remCTimeout = setTimeout(function() {
						if ($this.hasClass("is-hovered")) {
							$this.addClass("is-visible");
							//$('.animateArrow').removeClass('bounceInUp');
							$this.find('.arrows-block').addClass('bounceInDown');
							setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
						}
					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInDown');

				}, function() {

					var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.arrows-block').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.arrows-block').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.arrows-block').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);
			});
		
	});
	$("#nav").find('> li').each(function () {
		var $this = $(this);
		var nav_right     = $(".header-cont").innerWidth() - ( ($this.offset().left -$(".header-cont").offset().left) - $this.width());
		
		if(nav_right < 220 ){
			$(this).addClass('nav-left');			
		}else if(nav_right < 442){
			$(this).addClass('nav-div-left');
		}else{
			$(this).removeClass('nav-left').removeClass('nav-div-left');
		}
	});
	
	//Drop down menu
	
	//**************************************************************************************************************************************
	//ios menu click	
	window.isiPhone = function (){
		return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
		);
	};
	$('#nav li').each(function(){
		if ($(this).find("div.sub-menu").length > 0) {
			$(this).addClass('children');
		}
		else{
			$(this).removeClass('children');
		}
	});
	
	window.deviceAgent = navigator.userAgent.toLowerCase();
	window.agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
	window.ua = navigator.userAgent.toLowerCase();
	window.isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
	if( isAndroid || isiPhone() || agentID ) {
		var hasTouch = ("ontouchstart" in window);
		if (hasTouch && document.querySelectorAll) {
			var i, len, element,
				dropdowns = document.querySelectorAll("#nav > li.children > a, #nav > li.children > div > ul > li.children > a, .menu-container li.children");
		 
			function menuTouch(event) {
				var i, len, noclick = !(this.dataNoclick);
				// reset flag on all links
				for (i = 0, len = dropdowns.length; i < len; ++i) {
					dropdowns[i].dataNoclick = false;
				}		 
				// set new flag value and focus on dropdown menu
				this.dataNoclick = noclick;
				this.focus();
			}		 
			function menuClick(event) {
				// if click isn't wanted, prevent it
				if (this.dataNoclick) {
					event.preventDefault();
				}
			}		 
			for (i = 0, len = dropdowns.length; i < len; ++i) {
				element = dropdowns[i];
				element.dataNoclick = false;
				element.addEventListener("touchstart", menuTouch, false);
				element.addEventListener("click", menuClick, false);
			};
		};
	};
	$("<span class='a-l-s'></span><span class='arrow-bg'></span>").appendTo(".list-carousel .prev, .SliderNamePrev, .SliderNamePrev2, .list-carousel .next, .SliderNameNext, .SliderNameNext2");
	$('.prev').hover(function(){
		$(this).prev().addClass('pr-hov');
	},function(){
		$(this).prev().removeClass('pr-hov')
	});
	
	
	if( isAndroid || isiPhone() || agentID ){
	}else {
		var delete_cliked = false,
			delete_cliked_carous = false,
			delete_cliked_fancy = false,
			delete_cliked_go = false;
		$('.prev, .SliderNamePrev, .SliderNamePrev2, .next, .SliderNameNext, .SliderNameNext2').not('.temp_disabled').on('click', function(){
			$(this).addClass('cliked');
			clearTimeout(delete_cliked);
			delete_cliked = setTimeout(function(){			 
				$('.prev, .SliderNamePrev, .SliderNamePrev2, .next, .SliderNameNext, .SliderNameNext2').removeClass('cliked');
			},300);
		});
		
		
		$('#carousel-left, #carousel-right').on('click', function(){
			$(this).addClass('cliked');
			clearTimeout(delete_cliked_carous);
			delete_cliked_carous = setTimeout(function(){			 
				$('#carousel-left, #carousel-right').removeClass('cliked');
			},300);
		});
		
		$('.jfancytileBack, .jfancytileForward').on('click', function(){
			$(this).addClass('cliked');
			clearTimeout(delete_cliked_fancy);
			delete_cliked_fancy = setTimeout(function(){			 
				$('.jfancytileBack, .jfancytileForward').removeClass('cliked');
			},300);
		});
		
		$('.go-prev, .go-next').on('click', function(){
			$(this).addClass('cliked');
			clearTimeout(delete_cliked_go);
			delete_cliked_go = setTimeout(function(){			 
				$('.go-prev, .go-next').removeClass('cliked');
			},300);
		});
	}
	
	
	$('.prev, .prev-fl, .SliderNamePrev, .SliderNamePrev2, #carousel-left, .jfancytileBack, .go-prev').hover(function(){
		var $_this = $(this);
		$_this.next('.next').addClass('hovered');
		$_this.next('.go-next').addClass('hovered');
		$_this.next('#carousel-right').addClass('hovered');
		$_this.next('.SliderNameNext, .SliderNameNext2').addClass('hovered');
		$_this.next('.jfancytileForward').addClass('hovered');
		$_this.next('.next-fl').addClass('hovered');
		$_this.addClass('no-hovered');
	}, function(){
		var $_this = $(this);
		$_this.next('.next').removeClass('hovered');
		$_this.next('#carousel-right').removeClass('hovered');
		$_this.next('.go-next').removeClass('hovered');
		$_this.next('.SliderNameNext, .SliderNameNext2').removeClass('hovered');
		$_this.next('.jfancytileForward').removeClass('hovered');
		$_this.next('.next-fl').removeClass('hovered');
		$_this.removeClass('no-hovered');
	});
	
	
	
	//********************************************************************************************************************************

	$('.list-carousel, .reviews-t, .about, .partner-bg').css('visibility', 'visible');
	$('.list-carousel.bx').css('overflow', 'visible');
	//Carousel widgets and shortcodes
	
jQuery(document).ready(function($){
	
		$.fn.imageLoaded = function(callback, jointCallback, ensureCallback){
		var len	= this.length;
		if (len > 0) {
			return this.each(function() {
				var	el		= this,
					$el		= $(el),
					blank	= "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";

				$el.on("load.dt", function(event) {
					$(this).off("load.dt");
					if (typeof callback == "function") {
						callback.call(this);
					}
					if (--len <= 0 && (typeof jointCallback == "function")){
						jointCallback.call(this);
					}
				});

				if (!el.complete || el.complete === undefined) {
					el.src = el.src;
				} else {
					$el.trigger("load.dt")
				}
			});
		} else if (ensureCallback) {
			if (typeof callback == "function") {
				jointCallback.call(this);
			}
			return this;
		}
	};
		
		window.preloadImages = function () {
			var $my_images = $('#container img, #footer img, #slide img, #slider img, #aside img');
			var $my_images_bg = $('.photo img, .view img, .img-frame img, #slider img, .flexslider img, .alignleft-f img, .gallery-item img');
			$my_images.css({'opacity':'0','visibility':'visible'});
			$my_images_bg.css({'opacity':'0','visibility':'visible'});
			
			$my_images_bg.wrap('<div class="loading-image" />').css({'opacity':'0','visibility':'visible'});
		
			$my_images.each( function() {
				$(this).imageLoaded(function(){
					$(this).animate({'opacity':'1'}, 500, function(){
					});
				});
			});
			$my_images_bg.each( function() {
				$(this).imageLoaded(function(){
					$(this).animate({'opacity':'1'}, 500, function(){
						$(this).unwrap();
					});
				});
			});
		};
		
		window.preloadAjaxImages = function () {
	
	// why are we calling preloading script on allmost every image on ajax load???
	
			var $my_images = $('.dt-ajax-content img');
			//var $my_images_bg = $('.photo img, .view img, .img-frame img, #slider img, .flexslider img, .alignleft-f img');
			$my_images.css({'opacity':'0','visibility':'visible'});
			$my_images.wrap('<div class="loading-image" />').css({'opacity':'0','visibility':'visible'});
			$my_images.each( function() {
				$(this).imageLoaded(function(){
					$(this).animate({'opacity':'1'}, 500, function(){});
					$(this).unwrap();
				});
			});
		};
		
		preloadImages();

});

//------------------------------------------------------------------------------------------------------------------------------------

//Call BxSlider
	if ( $('.slider1, .carouFredSel_1').length > 0 ) {
		$('.slider1, .carouFredSel_1').each(function(){
			var	$this = $(this),

				autoslideOn			= $this.attr("data-autoslide_on") || 0,
				autoslideInterval	= parseInt($this.attr("data-autoslide") || 7000);			


			if(autoslideOn == "0") {
				autoslideOn = false;
			} else if (autoslideOn == "1") {
				autoslideOn = true;
			}

			var mySlider = $this.bxSlider({
				displaySlideQty: 6,
				auto : autoslideOn,
				pause	: autoslideInterval,
				autoHover	: true,
				moveSlideQty: 1,
				onInit: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
					var $this = currentSlideHtmlObject;
					
					var $activePanel	= $(currentSlideHtmlObject).find(".panel-author").clone().hide();

					if ($activePanel.length < 1) return false;
					if ($this.parents(".reviews-t").next().hasClass("autor")) return false;

					var $bigPapa = $this.parents(".reviews-t");
					var $authorPapa = $bigPapa.find(".autor").detach();
					
					$bigPapa.after($authorPapa);
					
					$authorPapa.append($activePanel);
					$activePanel.show();

					$authorPapa = null;
					$activePanel = null;
				},
				onDestroy: function() {
					$this.parents(".reviews-t").next().find(".panel-author").remove();
				},
				onBeforeSlide: function() {
					$this.parents(".reviews-t").next().find(".panel-author").fadeOut(150, function() { $(this).remove(); });
					$this.find(".loading-image > img").each(function() {
						$(this).unwrap().animate({"opacity" : 1}, 500);
					});
				},
				onAfterSlide: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
					var $this = currentSlideHtmlObject;

					if ($this.parents(".list-carousel").hasClass("coda")) {
						$this.parents(".bx-window").css({
							height: currentSlideHtmlObject.height()
						});
					}

					var $activePanel	= $(currentSlideHtmlObject).find(".panel-author").clone().hide();
					if ($activePanel.length < 1) return false;

					var $authorPapa = $this.parents(".reviews-t").next();
						
					$authorPapa.append($activePanel);
					$activePanel.delay(180).fadeIn(230, function() { $activePanel = null; });
					
					$authorPapa = null;	
				}
				
			});
		
			$this.data("carousel", mySlider);
		
		 });
	};
	

	//Bx for widgets
	if ( $('.sliderBx').length > 0 ){
		$('.sliderBx').each(function(){
			 var $this = $(this),
				/*this_par_w = $this.parents('.list-carousel').width(),
				this_children_w = $this.children('li').width(),
				this_children_Length = $this.children('li.bx-child'),
				num_show = Math.round(this_par_w/this_children_w),*/
				autoslideOn			= $this.attr("data-autoslide_on") || 0,
				autoslideInterval	= parseInt($this.attr("data-autoslide") || 7000);			
			if(autoslideOn == "0") {
				autoslideOn = false;
			} else if (autoslideOn == "1") {
				autoslideOn = true;
			}
			var mySlider = $this.bxSlider({
				//displaySlideQty: 1,
				auto : autoslideOn,
				pause	: autoslideInterval,
				autoHover	: true,
				
				moveSlideQty: 1,

				// fix highslide gallery reduplication
				onInit: function() {
					var index = 0;
					$this.find('.clones').each(function() {
						var _this = $(this),
							_hiddenContainer = _this.find('.hidden-container');

						if ( _hiddenContainer.length <= 0 ) return;

						index++;
						var	_links = _hiddenContainer.find('a.highslide'),
							hs_group = _hiddenContainer.attr('data-hs_group'),
							new_hs_group = hs_group.split('_');

						new_hs_group[ new_hs_group.length - 1 ] = 'clone_' + index;
						new_hs_group = new_hs_group.join('_');

						_hiddenContainer.attr('data-hs_group', new_hs_group);
						_links.each(function(){$(this).attr('onclick', $(this).attr('onclick').replace(hs_group, new_hs_group)); });
					});
				}
				
			});
			$this.data( "carousel", mySlider );
		 });
	};
});

//-----------------------------------------------------------------------------------------------------------------------------------

/*Carousel height*/
jQuery( function($) {
	var wrap=$('.caroufredsel_wrapper ul').find(" > img");
	    var h_wrap = wrap.height();
	$(this).css('height', h_wrap); //'.caroufredsel_wrapper'
});
//------------------------------------------------------------------------------------------------------------------------------------
/*Widget find last element*/
jQuery( function($) {
	$(".widget").each(function () {
		$(this).find(".post:last-child").addClass('last');
	})
	$("#aside").find(".widget:last-child").addClass('last');
});
//------------------------------------------------------------------------------------------------------------------------------------
//Width for h1
// что это?
jQuery( function($) {
	var inner_w = $('.inner-navig').width();
	if(('.inner-navig').length){
		$('#container > h1').css({
			'maxWidth':$('#container').width() - 40 - inner_w,
			'visibility': 'visible'
		})
	}
	else{
	}
});
//------------------------------------------------------------------------------------------------------------------------------------
//Width for portfolio inner info
// что это?
jQuery( function($) {	
	var anit_w = $('.slider-shortcode').width();
	if(!$('.slider-shortcode').length){
		$('.full-left').css({
			'maxWidth':100+'%'
		})		
	}
	else {
		$('.full-left').css({
			'maxWidth':960 - 40 -anit_w
		})
	}
});
//------------------------------------------------------------------------------------------------------------------------------------
/*nivo-caption width*/
jQuery( function($) {
	$(".slider-shortcode").each(function () {
		var im=$(this).find("img");
		var im_w = $(this).width();
		var im_h = im.attr("height");
		$('.nivo-caption', this).css({
			'width': im_w
		})
		$('.html-caption', this).css({
			'width': im_w -36
		}).show();
	});
	//***************************************************************************************************************************************
	$(".widget").find(' .nivoSlider').each(function () {
		var im=$(this).find("img");
		var im_w = im.attr("width")-8;
		var im_h = im.attr("height");
		$('.nivo-caption', this).css('width', im_w, 'maxHeight', im_h/3);
	});
	//***************************************************************************************************************************************
	$(".full-width .slider-shortcode, .one-fourth .slider-shortcode, .half .slider-shortcode, .one-third .slider-shortcode, .two-thirds .slider-shortcode").each(function () {
		var im=$(this).find("img");
		var im_w = im.attr("width");
		var im_h = im.attr("height");
		$('.nivo-caption', this).css({
			'width': im_w - 8,
			'maxHeight': im_h/2
		});		
	});
});
//------------------------------------------------------------------------------------------------------------------------------------

/*Slider textwidget*/
jQuery( function($) {			
	var cache_carous = $('.list-carousel .textwidget');
	if (!('.list-carousel .textwidget').length){
		return false;
	}
	cache_carous.each(function() {
		var this_hs = $('.highslide', this)
		if(this_hs.length){	
			if( isAndroid || isiPhone() || agentID ){
			}else{
				$('.widget-info', this).bind('click', function(){
					$(this).siblings('.textwidget-photo').find('.photo').trigger('click');					
					return false;
				});
			}
		}else{
			
			if( isAndroid || isiPhone() || agentID ){}
			else{				
				$('.widget-info', this).bind('click', function(){
					window.location = $(this).siblings('.textwidget-photo').find('.photo').attr('href');					
					return false;
				});				
			}
		};
		
		if( $('.widget-info', this).length ){			
			$('.photo', this).addClass('hide-zoom');
			$('.photo', this).removeClass('show-zoom');			
		}
		else{						
			$('.photo', this).removeClass('hide-zoom');
			$('.photo', this).addClass('show-zoom');			
		};
	});
	$('a.photo.show-zoom').append('<i class="fade"></i>');	
	$('.textwidget-photo').append('<div class="animateArrow"><span class="arrows-nav"><i class="one-el"></i></span><span class="arrows-nav-two"><i class="two-el"></i></span></div>');
	
	$(window).on('resize', function(){
		
		cache_carous.each(function() {					
			var $this = $(this),
				w = $this.find("img"),
				w_w = w.width(),
				w_h = w.height();
			$('.widget-info, .widget-info .info', $this).css({
				height: w_h -35,
				width: w_w -40
			});
			$('.widget-info .info', $this).css({
				'maxHeight': w_h -45
			});
					
		});
	});
	cache_carous.each(function() {			
			
		var $this = $(this);
		var h = $('img', this).height();
		var this_hs = $('.highslide', this);
		
		if( isAndroid || isiPhone() || agentID ){
			
				if( this_hs.length < 1){
					if ( $('.widget-info', this).length < 1 ) {
						$('.widget-info', this).bind('click', function(e){
							window.location = $(this).siblings('.textwidget-photo').find('.photo').attr('href');									
							return false;
						});
		
					}else {
						
						$(this).on('click', function(event){
							
							if ($(this).hasClass("is-clicked")) {
								window.location = $(this).find('.photo').attr('href');
								return false;
							} else {
								
								$(".textwidget").removeClass("is-clicked");
								$(this).addClass("is-clicked");
								
								return false;
							}
					
						});
							
					};	
				}else{
					if ( $('.widget-info', this).length < 1 ) {
									
					}else {
						
											
						$('.widget-info', this).on('click', function(event){
							
							
							if ($(this).parent().hasClass("is-clicked")) {
								var this_children = $(this).siblings('.textwidget-photo').find('.photo').trigger('click');	
								this_children.trigger('click');
								return false;
							} else {
								$(".textwidget").removeClass("is-clicked");
								$(this).parent().addClass("is-clicked");		
								return false;
							}					
						});							
					};						
				};
			};	

		if(blur_effect) {
			if( isAndroid || isiPhone() || agentID ){}
			else{
				blurHide = false;
				$(this).hover(function() {
					$(".blur-effect").remove(); // this may decrease down performance: remove() is kinda slow
					var img_this = $('.textwidget-photo', this).find('img');
					img_this.clone().addClass("blur-effect").prependTo(this);
					$(".blur-effect", this).pixastic("blurfast", {amount:0.1});
					var blur_this = $(".blur-effect", this);
					blur_this.hide();
					//blur_this.show();
					clearTimeout(blurHide);
					blurHide = setTimeout(function() {
						blur_this.stop().delay(200).fadeTo(400, 1);
					}, 100);
					img_this = null;
				}, function() {
					$(".blur-effect", this).stop().delay(100).fadeOut(400, function() {
						$(this).remove();
					});
				});				
			}
		} else {};
		if( (isAndroid || isiPhone() || agentID) && $('.widget-info', this).length < 1 ){}
		else{
			var overfTimeout = false,
				remCTimeout = false,					
				addCTimeout = false,
				removeTimeout = false;
			$(this).hover(function() {				
				var $this = $(this);
					$this.addClass("is-hovered");
		
					clearTimeout(remCTimeout);
					//clearTimeout(addCTimeout);
					
					remCTimeout = setTimeout(function() {
						if ($this.hasClass("is-hovered")) {
							$this.addClass("is-visible");
							//$('.animateArrow').removeClass('bounceInUp');
							$this.find('.animateArrow').addClass('bounceInDown');
							setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
						}
					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInDown');

				}, function() {

					var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.animateArrow').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.animateArrow').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.animateArrow').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);
			});
		}
		var i = $(this).find(" > img");
		var i_w = i.width();
		var i_h = i.height();
		$('i.fade', this).css('width', i_w);
		$('i.fade', this).css('height', i_h);
		i = null;
	});
	if (!('.widget-info').length) {
		return false;
	} else {
		/*jQuery(window).bind("popstate", function() {
			$(".textwidget").removeClass("is-clicked");
		});*/
		/*$("#bg, #wrap").on("click", function(){	
			$(".textwidget").removeClass("is-clicked");
		});*/
		/*
		$('.list-carousel').bind('touchmove',function(e){
			$(".textwidget").removeClass("is-clicked");
		});*/
		// Cancel all click events off of paragraphs.
	}

});
//------------------------------------------------------------------------------------------------------------------------------------
//PS fade info
jQuery( function($) {
	if (!('.ps-album').length){
		return false;
	} else {
	$(".ps-album-inner").hover(
		function() {
			if ($.browser.msie && $.browser.version < 9)
			{
				$(".slide-desc", this).stop().show();
			} else {
				$(".slide-desc", this).stop().fadeTo(400, 1);
			}
		} , function() {
			if ($.browser.msie && $.browser.version < 9)
			{
				$(".slide-desc", this).stop().hide();
			} else {
				$(".slide-desc", this).stop().fadeTo(200, 0, function(){$(this).hide()});
			}
		});
	}
	if ($.browser.msie && $.browser.version < 9)
	{
		$('.twitter-img').children('span').stop().hide();
		$('.twitter-img').hover(function(){
			$(this).children('span').stop().show();
		}, function(){
			$(this).children('span').stop().hide();
		})
	}
	else{}
});
//------------------------------------------------------------------------------------------------------------------------------------

/*Highslide*/

hs.showCredits = 0;
		hs.padToMinWidth = true;		
		//hs.align = 'center';
		if (hs.registerOverlay) {
			// The white controlbar overlay
			hs.registerOverlay({
				thumbnailId: 'thumb3',
				overlayId: 'controlbar',
				position: 'top right',
				hideOnMouseOut: true
			});
			// The simple semitransparent close button overlay
			hs.registerOverlay({
				thumbnailId: 'thumb2',
				html: '<div class="closebutton"	onclick="return hs.close(this)" title="Close"></div>',
				position: 'top right',
				fade: 2 // fading the semi-transparent overlay looks bad in IE
			});
		}
		
		// ONLY FOR THIS EXAMPLE PAGE!
		// Initialize wrapper for rounded-white. The default wrapper (drop-shadow)
		// is initialized internally.
		if (hs.addEventListener && hs.Outline) hs.addEventListener(window, 'load', function () {
			new hs.Outline('rounded-white');
			new hs.Outline('glossy-dark');
		});
		
		// The gallery example on the front page
		var galleryOptions = {
			slideshowGroup: 'gallery',
			wrapperClassName: 'dark',
			//outlineType: 'glossy-dark',
			dimmingOpacity: 0.8,
			align: 'center',
			transitions: ['expand', 'crossfade'],
			fadeInOut: true,
			wrapperClassName: 'borderless floating-caption',
			/*marginLeft: 100,
			marginBottom: 60,*/
			captionEval: null
		};
		
		if (hs.addSlideshow){ hs.addSlideshow({
			slideshowGroup: 'gallery',
			interval: 5000,
			repeat: false,
			useControls: true,
			overlayOptions: {
				className: 'text-controls',
				position: 'bottom center',
				relativeTo: 'viewport',
				offsetY: -10
			}/*,
			thumbstrip: {
				position: 'left top',
				mode: 'vertical',
				relativeTo: 'viewport'
			}
		*/
		});}
		hs.Expander.prototype.onInit = function() {
			hs.marginBottom = (this.slideshowGroup == 'gallery') ? 60 : hs.marginBottom;
			theMobile();
		}
		
		// focus the name field
		hs.Expander.prototype.onAfterExpand = function() {
		
			if (this.a.id == 'contactAnchor') {
				var iframe = window.frames[this.iframe.name],
					doc = iframe.document;
				if (doc.getElementById("theForm")) {
					doc.getElementById("theForm").elements["name"].focus();
				}		
			}
		}	
		
		// Not Highslide related
		function frmPaypalSubmit(frm) {
			if (frm.os0.value == '') {
				alert ('Please enter your domain name');
				return false;
			}
			return true;
		}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Footer

jQuery( function($) {
	///
	$(window).resize(function () {
		if ($("body").hasClass("fs-enabled")) return;
		h = window.innerHeight - $("#top-bg").outerHeight() - $("#header").outerHeight() - $("#slide").outerHeight() - $(".line-footer").outerHeight() - $("#footer").outerHeight()-50;
		$("#container").css('min-height', h+"px");
	});
	//$(window).trigger("resize");
/*
	setTimeout(function() {
		$(window).trigger("resize");
	}, 1500);
*/
	
});
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//do hover effect
//hover effect
jQuery( function($) {
//	window.blur_effect = 1;

	$('.img-post, .alignleft-f').addClass('small');
	$('a.img-frame > img').wrap('<span class="img-wrap" />');
	$('.img-wrap, .gallery-item a, .alignleft-f, .about-autor .img-frame').append('<i class="line-top"></i>');
	$('.alignleft-f').append('<i class="fade"></i>');
	if(agentID || isAndroid || isiPhone()){
		
	}
	else {
		$('a.img-frame, a.alignleft, a.alignright, a.alignnone, .gallery-item a').append('<i class="fade"></i><div class="animateArrow"><span class="arrows-nav"><i class="one-el"></i></span><span class="arrows-nav-two"><i class="two-el"></i></span></div>');		
	}
	if(agentID || isAndroid || isiPhone()){
		$('i.fade').hide();
	} else {
		$('a.img-frame, a.alignleft, a.alignright, a.alignnone, .gallery-item a, .alignleft-f').not(".no-hover").each(function() {
					
			var $this = $(this);
	
			if(blur_effect) {
				blurHide=false;
				$(this).hover(function() {
					$(".blur-effect").remove(); // this may decrease down performance: remove() is kinda slow
	
					var img_this = $(this).find('img');
					img_this.clone().addClass("blur-effect").prependTo(this);
					$(".blur-effect", this).pixastic("blurfast", {amount:0.1});
					var blur_this = $(".blur-effect", this);
					blur_this.hide();
					//blur_this.show();
					clearTimeout(blurHide);
					blurHide = setTimeout(function(){
						blur_this.stop().delay(200).fadeTo(400, 1);
					}, 100);
	
					img_this = null;
				}, function() {
				  $(".blur-effect", this).stop().delay(100).fadeOut(400, function() {
					  $(this).remove();
				  });
				});
	
			} else {};
			var h = $('img', this).height();
				
				
			var overfTimeout = false,
				remCTimeout = false,					
				addCTimeout = false,
				removeTimeout = false;
			$(this).hover(function() {				
				var $this = $(this);
					$this.addClass("is-hovered");
		
					clearTimeout(remCTimeout);
					//clearTimeout(addCTimeout);
					
					remCTimeout = setTimeout(function() {
						if ($this.hasClass("is-hovered")) {
							$this.addClass("is-visible");
							//$('.animateArrow').removeClass('bounceInUp');
							$this.find('.animateArrow').addClass('bounceInDown');
							setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
						}
					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInDown');

				}, function() {

					var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.animateArrow').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.animateArrow').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.animateArrow').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);
			});
			
			
			$(this).hover(function() {
				
				var $this = $(this);
				$this.addClass("is-hovered");
	
				clearTimeout(remCTimeout);
				//clearTimeout(addCTimeout);
				
				remCTimeout = setTimeout(function() {
					if ($this.hasClass("is-hovered")) {
						$this.addClass("is-visible");
						//$('.animateArrow').removeClass('bounceInUp');
						$this.find('.animateArrow').addClass('bounceInDown');
						setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
					}
				}, 100);
				/*$this.find('.animateArrow').addClass('bounceInDown');
				
				$this.find('i.two-el').stop().animate({
				}, 500, function() {							
					var tiemout = setTimeout(function() {
					$this.find('.two-el').css('zIndex', '203');
					clearTimeout( tiemout );
					}, 300);							
				});*/

			}, function() {
				var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.animateArrow').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.animateArrow').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.animateArrow').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);					
			});
		});
	}
	
	window.doHover = function () {

		if(agentID || isAndroid || isiPhone()){
			$('i.fade').hide();
		} else {
			$('a.img-frame, a.alignleft, a.alignright, a.alignnone, .gallery-item a, .alignleft-f').not(".no-hover").each(function() {				
				var $this = $(this);					
				var h = $('img', this).height();				
				var i = $(this).find(" img");
				var i_w = i.width();
				var i_h = i.height();
				$('i.fade', this).css('width', i_w);
				$('i.fade', this).css('height', i_h);
				i = null;
			});
			
		};		
	};
	
	doHover();
	//photostack blur
	if(!blur_effect) {
	}else{
		if( isAndroid || isiPhone() || agentID ){}
		else{
			$('.ps-album-inner').each(function(){
				blurHide = false;
				$(this).hover(function() {
					if($(this).hasClass('ps-inner-link-only')){
					}else{
					$(".blur-effect").remove(); // this may decrease down performance: remove() is kinda slow
	
					var img_this = $(this).find('img');
					img_this.clone().addClass("blur-effect").prependTo(this);
					$(".blur-effect", this).pixastic("blurfast", {amount:0.1});
					var blur_this = $(".blur-effect", this);
					blur_this.hide();
					//blur_this.show();
					clearTimeout(blurHide);
					blurHide = setTimeout(function(){
						blur_this.stop().delay(200).fadeTo(400, 1);
					}, 100);
	
					img_this = null;
					}
				}, function() {
				  $(".blur-effect", this).stop().delay(100).fadeOut(400, function() {
					  $(this).remove();
				  });
				});
			});
		}
	}
})


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
jQuery( function($){
	$('.one-fourth .header, .one-fourth h2, .one-third .header, .one-third h2, .half .header, .half h2, .two-thirds .header, .two-thirds h2, .full-width .header, .full-width h2').each(function(){
		var $this = $(this);
		var nex = $this.next()
		var parent = $this.parent();
		var parent_width = parent.width();
		if(nex.hasClass('reviews-t') || nex.hasClass('partner-bg')){			
			$this.addClass('max-w');
			$this.css({
				maxWidth:parent_width-40
			});
		}
	})
	//********************************************************************************************************************************************************
	//Arrow slider for window < 1030
	$(window).resize(function () {
		var window_w = $(window).width();
		if(window_w < 1030){
			$('.onebyone-arrows, .caros-arrows, .ps-arrows, .oneByOne1, .slider-shortcode, .fancy-arrows').addClass('small');
			$('.ps-arrows.small').detach().appendTo('#slide');
		}
		else {
			$('.onebyone-arrows, .caros-arrows, .ps-arrows, .oneByOne1, .slider-shortcode, .fancy-arrows').removeClass('small');
			$('.ps-arrows').detach().prependTo('#slide');
		}
	});
	//$(window).trigger("resize");
	
	//fullscreen hover arrows
	$('.go-prev a, .go-next a').hover(function() {
		var $_this = $(this);
		$_this.parent().addClass('is-hover');
	}, function() {
		var $_this = $(this);
		$_this.parent().removeClass('is-hover');
	})

})
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// new ajax scripts
  
// comments form
function move_form_to(ee)
{
      ( function($) {
      var e = $("#form-holder").html();
      var tt = $("#form-holder .header").text();
      
      var sb =$("#form-holder .go_button").attr("title");
      
      var to_slide_up = ($(".comment #form-holder").length ? $("#form-holder") : $(".share_com"));
      
      to_slide_up.slideUp(500, function () {
         $("#form-holder").remove();
         
         ee.append('<div id="form-holder">'+e+'</div>');
         $("#form-holder .header").html(tt);
         $("#form-holder [valed]").removeAttr('valed');
         $("#form-holder .do-clear").attr('remove', 1);
		 
         $(".formError").remove();
         
         $("#form-holder").hide();
         
         to_slide_up = ($(".comment #form-holder").length ? $("#form-holder") : $(".share_com"));
         if (to_slide_up.hasClass('share_com')) $("#form-holder").show();
         
         to_slide_up.slideDown(500);
         
         if (ee.attr("id") != "form_prev_holder")
         {
            var eid = ee.parent().attr("id");
            if (!eid)
               eid = "";
            $("#comment_parent").val( eid.replace('comment-', '') );
         }
         else
         {
            $("#comment_parent").val("0");
         }
         
         //update_form_validation();
      });

      })(jQuery);
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
jQuery(function ($) {
   $("#comments ").on('click', '.comments', function () {
      move_form_to( $(this).parent().parent() );
      return false;
   });
});
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
jQuery(document).ready( function($) {
    $('form a.do-clear').live( 'click', function() {
        var container = $(this).parents('form.uniform');
        if( container.length ) {
            $('.i-h > input, .t-h > textarea', container ).val('');
        }

		if ($(this).attr("remove") && !$(this).parents("#form_prev_holder").length) {
			move_form_to( $("#form_prev_holder") );
			$("#form_holder .do_clear").removeAttr('remove');
		}

        return false;
    });
});
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// new added
jQuery(document).ready( function($) {
    $(document).on( "click", ".go_submit, .go_button", function () {
      var e = $(this).parents("form");

      if( !e.attr("valed") && e.hasClass('ajaxing') ) {
        e.validationEngine({
            ajaxSubmit: true,
            ajaxSubmitFile: e.attr("action")
        });
      }else if( !e.attr("valed") ) {
        e.validationEngine();
      }

      e.attr("valed", "1");
      e.submit(); 

      return false;
   });

});
// end comments form
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

(function($) {
	$.fn.addWidgetHover = function() {

		var theGallery = $(".gallery"); // add hovers only to NEW ajax content
		$(".widget-info > .textwidget-photo", theGallery).hide(); // this is sollution a-la "per rectum"

		var widgetHoverTimeout;
		
		
		$('.img-wrap', theGallery).append('<i class="line-top"></i>');
		$('.textwidget', theGallery).each(function() {
			var this_hs = $('.highslide', this);
			if( $('.widget-info', this).length ){				
				$('.photo', this).addClass('hide-zoom');
				$('.photo', this).removeClass('show-zoom');				
				if(this_hs.length){
					if( isAndroid || isiPhone() || agentID ){
					}else{						
						$('.widget-info', this).bind('click', function(){							
							$(this).siblings('.textwidget-photo').find('.photo').trigger('click');					
							return false;
						});						
					};					
				}else{
					if( isAndroid || isiPhone() || agentID ){
					}else{						
						$('.widget-info', this).bind('click', function(){
							window.location = $(this).siblings('.textwidget-photo').find('.photo').attr('href');					
							return false;
						});						
					};										
				};
			}
			else{			
				$('.photo', this).removeClass('hide-zoom');
				$('.photo', this).addClass('show-zoom');
			};			
			var $this = $(this),
				w = $this.find("img"),
				w_w = w.width(),
				w_h = w.height();
			$('.widget-info, .widget-info .info', theGallery).css({
				height: w_h -35,
				width: w_w -40
			});
			$('.widget-info .info', $this).css({
				'maxHeight': w_h -45,
				width: w_w -40
			});
			if( isAndroid || isiPhone() || agentID ){
				
				if( this_hs.length < 1){
					if ( $('.widget-info', theGallery).length < 1 ) {
						$('.widget-info', theGallery).bind('click', function(e){
							window.location = $(this).siblings('.textwidget-photo').find('.photo').attr('href');									
							return false;
						});
		
					}else {
						
						$(this).on('click', function(event){
							
							if ($(this).hasClass("is-clicked")) {
								window.location = $(this).find('.photo').attr('href');
								return false;
							} else {
								
								$(".textwidget").removeClass("is-clicked");
								$(this).addClass("is-clicked");
								
								return false;
							}
					
						});
							
					};	
				}else{
					if ( $('.widget-info', theGallery).length < 1 ) {
									
					}else {
						
						$('.widget-info', this).on('click', function(event){
							
							//alert($(".textwidget").attr('class'))
							if ($(this).parent().hasClass("is-clicked")) {
								var this_children = $(this).prev('.textwidget-photo').find('.photo');
								this_children.trigger('click');
								return false;
							} else {
								$(".textwidget").removeClass("is-clicked");
								$(this).parent().addClass("is-clicked");		
								return false;
							}					
						});							
					};						
				};
			};			
		});
					
		var h = $('img', theGallery).height();	
		
		if( $('.widget-info', theGallery).length ){
			
			if(blur_effect) {
				
				if( isAndroid || isiPhone() || agentID ){					
					$(".textwidget").addClass('no-blur');					
				}
				else{					
					$(".textwidget").removeClass('no-blur');
					blurHide = false;
					$(".textwidget", theGallery).hover(function() {
						
						$(".blur-effect").remove(); // this may decrease down performance: remove() is kinda slow	
						var img_this = $('.textwidget-photo', this).find('img');
						img_this.clone().addClass("blur-effect").prependTo(this);
						$(".blur-effect", this).pixastic("blurfast", {amount:0.1});
						var blur_this = $(".blur-effect", this);
						blur_this.hide();
						//blur_this.show();
						clearTimeout(blurHide);
						blurHide = setTimeout(function() {
							blur_this.stop().delay(200).fadeTo(400, 1);
						}, 100);
						img_this = null;
						
					}, function() {
						
					  $(".blur-effect", this).stop().delay(100).fadeOut(400, function() {
						  $(this).remove();
					  });					  
				});
			}	
		} else {};
			var overfTimeout = false,
				remCTimeout = false,					
				addCTimeout = false,
				removeTimeout = false;	
			$(".textwidget", theGallery).hover(function() {				
				var $this = $(this);
					$this.addClass("is-hovered");
		
					clearTimeout(remCTimeout);
					//clearTimeout(addCTimeout);
					
					remCTimeout = setTimeout(function() {
						if ($this.hasClass("is-hovered")) {
							$this.addClass("is-visible");
							//$('.animateArrow').removeClass('bounceInUp');
							$this.find('.animateArrow').addClass('bounceInDown');
							setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
						}
					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInDown');

				}, function() {

					var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.animateArrow').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.animateArrow').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.animateArrow').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);
			});			
		}
		else {
			if( isAndroid || isiPhone() || agentID ){				
				$(".textwidget").addClass('for-ios');				
			}
			else{
				$(".textwidget").removeClass('for-ios');
				if(blur_effect) {
					blurHide = false;			
					$(".textwidget-photo", theGallery).hover(function() {
						$(".blur-effect").remove(); // this may decrease down performance: remove() is kinda slow
		
						var img_this = $(this).find('img');
						img_this.clone().addClass("blur-effect").prependTo(this);
						$(".blur-effect", this).pixastic("blurfast", {amount:0.1});
						var blur_this = $(".blur-effect", this);
						blur_this.hide();
						//blur_this.show();
						clearTimeout(blurHide);
						blurHide = setTimeout(function() {
							blur_this.stop().delay(200).fadeTo(400, 1);
						}, 100);
		
						img_this = null;
					}, function() {
					  $(".blur-effect", this).stop().delay(100).fadeOut(400, function() {
						  $(this).remove();
					  });
					});
		
				} else {};
		
				var overfTimeout = false,
					remCTimeout = false,					
					addCTimeout = false,
					removeTimeout = false;

				$(".textwidget-photo", theGallery).hover(function() {				

					var $this = $(this);
					$this.addClass("is-hovered");
		
					clearTimeout(remCTimeout);
					//clearTimeout(addCTimeout);
					
					remCTimeout = setTimeout(function() {
						if ($this.hasClass("is-hovered")) {
							$this.addClass("is-visible");
							//$('.animateArrow').removeClass('bounceInUp');
							$this.find('.animateArrow').addClass('bounceInDown');
							setTimeout(function() { $('.arrows-nav-two').css('overflow', 'visible'); }, 500);
						}
					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInDown');

				}, function() {

					var $this = $(this);
					$this.removeClass("is-hovered");
					
					clearTimeout(remCTimeout);
					clearTimeout(addCTimeout);
					
					addCTimeout = setTimeout(function() {
						
						if (!$this.hasClass("is-hovered")) {
							$('.animateArrow').removeClass('bounceInDown');
							if ($this.hasClass("is-visible")) {
								$this.removeClass("is-visible");
								$this.find('.animateArrow').addClass('bounceInUp');
								setTimeout(function() { $('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
								setTimeout(function() { $('.animateArrow').removeClass('bounceInUp'); }, 500);
							}
						}

					}, 100);
					//$(this).find('.animateArrow').delay(6000).addClass('bounceInUp');

				});
			};
		};
	
			var i = $(this).find(" > img");
			var i_w = i.width();
			var i_h = i.height();
			$('i.fade', this).css('width', i_w);
			$('i.fade', this).css('height', i_h);
			i = null;
	
	}
	
})(jQuery);

function widget_add_hover() {
	jQuery.fn.addWidgetHover();
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function element_add_hover( element ) {
    
    if( typeof element == 'string' ) {
        element = jQuery(element);
    }
    
    var span;
    if( typeof arguments[1] == 'undefined' || typeof arguments[1] == 'number' ) {
        span = jQuery('>i.widget-inf', element);
    }else if( typeof arguments[1] == 'string' ) {
        span = jQuery(arguments[1], element);
    }else {
        span = arguments[1];
    }
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function portfolio_add_zoom( element ) {
    if( typeof element == 'string' ) {
        element = jQuery(element);
    }

    element.each(function(){
	});
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function list_to_grid() {	
    jQuery(".gallery-inner").addClass('grid').fadeOut("fast", function() {
	    jQuery(this).fadeIn("fast").addClass("w-i");
		jQuery('.textwidget:first', this).removeClass('first')
        jQuery('.textwidget.text', this).each(function(){
	        jQuery(this).removeClass('text').addClass('children');
			jQuery('.info', this).each(function () {
			    jQuery(this).wrap("<div class='widget-info'></div>");
			});						
            jQuery('.textwidget-photo', this).each(function() {
		        jQuery(this).clone(true).prependTo(jQuery(this).parent(".textwidget").find(".widget-info"))
			});
			jQuery('.widget-info .info a.button', this).removeClass("button").addClass('details');
		});
        portfolio_add_zoom( jQuery('.widget-info', this) );
    });
	return false;
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function grid_to_list() {
    $(".gallery-inner").removeClass('grid').fadeOut("fast", function() {
	    $(this).fadeIn("fast").addClass("t-l");
		$('.textwidget:first', this).addClass('first')
		$('.textwidget', this).each(function(){			
			$(this).addClass('text')
			$(this).append( $('.widget-info > .info', this))
			$('.widget-info', this).remove();
			$('.info a.details', this).removeClass("details").addClass('button')				
		});
	})		
	return false;
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function add_hover_effect() {
	var element = arguments[0];
    if( typeof element == 'string' ) {
        element = jQuery(element);
    }
	
    if( (typeof arguments[1] == 'undefined') || arguments[1] ) {			
		jQuery('a.photo.show-zoom').not('.list-carousel a.photo.show-zoom').append('<i class="fade"></i>');
		jQuery('.textwidget-photo').not('.list-carousel .textwidget-photo').append('<div class="animateArrow"><span class="arrows-nav"><i class="one-el"></i></span><span class="arrows-nav-two"><i class="two-el"></i></span></div>');
    }
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function isiPhone(){
	return (
		(navigator.platform.indexOf("iPhone") != -1) ||
		(navigator.platform.indexOf("iPod") != -1)
	);
}
if(isiPhone()) {
	jQuery('.fluid-width-video-wrapper').addClass('ip');
}
else{
	jQuery('.fluid-width-video-wrapper').removeClass('ip');
}
function add_i_height() {
	//doHover();
	jQuery(".textwidget-photo a.photo").each(function () {
		var im = jQuery(this).find("img"),
			im_h = im.height(),
			im_w = im.width(),
			myIm_h = parseInt(im_h),
			myIm_w = parseInt(im_w);
	if(jQuery('.protected-post-form').height() > im_h ){
		jQuery('.form-protect').addClass('hide-inf');
	}else{
		jQuery('.form-protect').removeClass('hide-inf');
	}
	if(jQuery(this).next('.form-protect').length){		
		jQuery(this).parent().parent().addClass('protect');		
	}
	else{		
		jQuery(this).parent().parent().removeClass('protect');		
	}
	jQuery(this).next('.form-protect').css({
			'height': im_h, 
			'width': im_w,
			'display':'block'
		});
		
		var form_w = jQuery(this).next('.form-protect').width();
		if(form_w < 230){
			jQuery(this).next('.form-protect').addClass('fourth')
		}
		else{
			jQuery(this).next('.form-protect').removeClass('fourth')
		}	
	});
	
	jQuery('.textwidget').each(function () {
		if( jQuery('.widget-info', this).length ){
			 var $span = jQuery('.form-protect', this);
			 if (jQuery.browser.msie && jQuery.browser.version < 9){
				$span.hide();
			 }else{
				$span.css('opacity', 0);
			 }
			  jQuery(this).hover(function () {
				  
				if (jQuery.browser.msie && jQuery.browser.version < 9){
				  $span.show();
				}else{
					
					$span.stop().fadeTo(500, 1);
				}
			  }, function () {
				if (jQuery.browser.msie && jQuery.browser.version < 9){
				  $span.hide();
				}else{
				  $span.stop().fadeTo(500, 0);
				}
			  });
		}else{
			 var $span = jQuery('.form-protect', this);
			 if (jQuery.browser.msie && jQuery.browser.version < 9)
				$span.hide();
			 else
				$span.css('opacity', 0);
			  jQuery('.textwidget-photo', this).hover(function () {
				  
				if (jQuery.browser.msie && jQuery.browser.version < 9)
				  $span.show();
				else
				$span.stop().fadeTo(500, 1);
			  }, function () {
				if (jQuery.browser.msie && jQuery.browser.version < 9)
				  $span.hide();
				else
				  $span.stop().fadeTo(500, 0);
			  });
		}
		 
	});
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function portfolio_add_cufon() {
    jQuery('.textwidget .info .head').each(function(){
		jQuery(this).clone().prependTo(jQuery(this).parent()).removeClass("head").addClass("hide-me");
	})		
	/*cufon_in_gall();*/
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// dt ajax object
function DT_PAGE_AJAX() {
    var used_hash = '';
    
    this.parse_hash = function( hash ) {
        if( -1 == hash.search(/\//) )
            return null;

        hash_arr = hash.split('/');
        
        if( hash_arr.length != 3 )
            return null;

        return hash_arr;
    }

    this.do_ajax = function( hash ) {
    
    	// Some preloading stuff by Miroslav
    	var loading_label = null;
    	
    	if (jQuery("#loading-label").length < 1) {
    		loading_label = jQuery("<div></div>").attr("id", "loading-label").addClass("loading-label").css("position" , "fixed").hide().appendTo("body");
    	} else {
	    	loading_label = jQuery("#loading-label");
    	}
    	
    	loading_label.fadeIn(250);
    
        hash = hash.slice(1);
        
        if( used_hash == hash ) {
            return false;
        }
        
        used_hash = hash;
        
        var cat_id = '', page = 1, layout = 'list';
        
        var hash_arr = this.parse_hash(hash);
        if( hash_arr ) {
            cat_id = hash_arr[0];
            page = hash_arr[1];
            layout = hash_arr[2]; 
        }else
            return false;

        jQuery('.dt-ajax-content').load( dt_ajax.ajaxurl, {
            action:         'dt_post_type_do_ajax',
            cat_id:         cat_id,
            paged:          page,
            post_id:        dt_ajax.post_id,
            layout:         layout,
            page_layout:    dt_ajax.page_layout,
            nonce:          dt_ajax.nonce 
        }, function( response ) {
			if( jQuery(this).parent().next().is('#nav-above') ) {
				jQuery(this).parent().next().detach();
			}
            jQuery('#nav-above', jQuery(this)).insertAfter(jQuery(this).parent());
			widget_add_hover();
            loading_label.fadeOut(500);
            add_hover_effect();
            if ( 'grid' == layout ) {
                jQuery(this).addClass("w-i");
                portfolio_add_zoom( jQuery('.widget-info', this) );
            }
            add_i_height();
            portfolio_add_cufon();
			jQuery(window).attachHs();
			preloadAjaxImages();
        });
  
    }
}
window.doSize = function(){	
		
			var funcObject = arguments.callee,
				$container = jQuery( '#container' );
			
			if ( typeof funcObject.dtHasSidebar == 'undefined' ) {
				
				if ( $container.hasClass( 'full-width' ) ) {
					funcObject.dtHasSidebar = false;
				} else {
					funcObject.dtHasSidebar = true;
				}
			};

			//size for hovers
			jQuery('a.img-frame, a.alignleft, a.alignright, a.alignnone, a.photo, .alignleft-f, .gallery-item a').each(function () {				  
				var i=jQuery(this).find(" img");
				var i_w = i.width();
				var i_h = i.height();
				jQuery('i.fade', this).css('width', i_w);
				jQuery('i.fade', this).css('height', i_h);
				if(jQuery('.protected-post-form').height() > i_h ){
					jQuery('.form-protect').addClass('hide-inf');
				}else{
					jQuery('.form-protect').removeClass('hide-inf');
				}
			});
			jQuery('.textwidget').each(function () {
				var $this = jQuery(this),
					w = $this.find("img"),
					w_w = w.width(),
					w_h = w.height();
				jQuery('.widget-info, .widget-info .info', this).css({
					height: w_h -35,
					width: w_w -40
				});
				jQuery('.widget-info .info', $this).css({
					'maxHeight': w_h -45,
					width: w_w -40
				});
			});
			/*Carousel height*/

		var wrap=jQuery('.caroufredsel_wrapper ul').find(" > img");
		var h_wrap = wrap.height();	
		jQuery(this).css('height', h_wrap); //'.caroufredsel_wrapper'
		//move soc-ico
		
		if(window.innerWidth < 1000){
			//alert('< 1006')
			//jQuery(".contact-block")/*.removeClass('not-mob')*/.addClass('mob-form');
			//jQuery('.mob-form .contact-cont').hide();
			jQuery(".contact-block").css({'visibility':'visible'});
		}
		else{
			//jQuery(".contact-block").removeClass('mob-form')/*.addClass('not-mob')*/;			
			//jQuery('.not-mob .contact-cont').fadeIn();
			jQuery(".contact-block").css({'visibility':'visible'});
		}
	
		/*//make width container
		
		if( notResponsive == 0 ) {
			jQuery('body').removeClass('not-responsive');
			if(window.innerWidth < 1006){
				jQuery('#container').removeClass('full-width');
			}
			else{
				jQuery('#container').addClass('full-width');
			}
			
			if(jQuery('#container').next('#aside').length || jQuery('#container').prev('#aside').length) {
				jQuery('#container').removeClass('full-width');
			}	
						
			return false;	
		}else {
			jQuery('body').addClass('not-responsive');			
			//return false;
			
		}*/
		
		/*if(window.innerWidth < 1006){
			jQuery('#container').removeClass('full-width');
		}
		else{
			jQuery('#container').addClass('full-width');
		}
		if(jQuery('#container').next('#aside').length || jQuery('#container').prev('#aside').length) {
			jQuery('#container').removeClass('full-width')
		}*/	
		if( notResponsive == 0 ) {
			jQuery('body').removeClass('not-responsive');
			if ( window.innerWidth < 1006 ) {
				if ( $container.hasClass( 'full-width' ) ) {
					$container.removeClass( 'full-width' );
				}
			}
			else if( ! funcObject.dtHasSidebar ) {
				if( ! $container.hasClass( 'full-width' ) ) {
					$container.addClass( 'full-width' );
				}
			}
			
//			if(jQuery('#container').next('#aside').length || jQuery('#container').prev('#aside').length) {
/*			if( funcObject.dtHasSidebar ) {
				jQuery('#container').removeClass('full-width')
			}
*/			
			return false;	
		}else {
			jQuery('body').addClass('not-responsive');			
			//return false;
			
		}
	}
jQuery(window).bind("popstate", function() {
    doSize();
	//jQuery(window).trigger('resize');
});
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
var dt_pajax_obj = new DT_PAGE_AJAX();

function dt_change_layout_hash() {
    var cur_hash = dt_pajax_obj.parse_hash(window.location.hash.slice(1));
	jQuery('.navig-category .categ').first().addClass('first');
    jQuery('.navig-category').children('.categ').each( function() {
		
        href = jQuery(this).attr('href').split('#');
        if( href && href.length == 2 ) {
            hash = dt_pajax_obj.parse_hash(href[1]);
            if( (hash && hash.length == 3) && (cur_hash && cur_hash.length == 3) ) {
                hash[0] = cur_hash[0];
                hash[1] = cur_hash[1];
                href[1] = hash.join('/');
                jQuery(this).attr('href', href.join('#'));
            }
        }
    });
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function dt_change_pagination_hash() {
    var cur_hash = dt_pajax_obj.parse_hash(window.location.hash.slice(1));
    jQuery('#nav-above').find('a').each( function() {
        href = jQuery(this).attr('href').split('#');
        if( href && href.length == 2 ) {
            hash = dt_pajax_obj.parse_hash(href[1]);
            if( (hash && hash.length == 3) && (cur_hash && cur_hash.length == 3) ) {
                hash[2] = cur_hash[2];
                hash[0] = cur_hash[0];
                href[1] = hash.join('/');
                jQuery(this).attr('href', href.join('#'));
            }
        }
    });
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function dt_replace( old_data, new_data ) {
    if( typeof old_data == 'array' && typeof new_data == 'array' ) {
        for( i=0;i<old_data.length;i++) {
            if( typeof new_data[i] != 'undefined' ) {
                old_data[i] = new_data[i];
            }
        }
    }else {
        old_data = new_data;
    }
    return old_data;
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function dt_change_navigation_hash() {
    var cur_hash = dt_pajax_obj.parse_hash(window.location.hash.slice(1));
    jQuery('.navig-category a.filter-button').each( function() {
        href = jQuery(this).attr('href').split('#');
        if( href && href.length == 2 ) {
            hash = dt_pajax_obj.parse_hash(href[1]);
            if( (hash && hash.length == 3) && (cur_hash && cur_hash.length == 3) ) {
                hash[2] = cur_hash[2];
                href[1] = hash.join('/');
                jQuery(this).attr('href', href.join('#'));
            }
        }
    });
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function dt_portfolio_ajax() {    
    var holder = jQuery('.navig-category');
    var hash_orig;
	
	jQuery('.td-three, .td').on('click', function(){
		jQuery('.gallery').addClass('grid');
	});
	jQuery('.list-three, .list').on('click', function(){
		jQuery('.gallery').removeClass('grid');
	});
	
    window.onhashchange = function() {
//        showBlackLoader();

        dt_change_layout_hash();
        dt_change_pagination_hash();
        dt_change_navigation_hash();

        dt_pajax_obj.do_ajax( window.location.hash );
    };

    if( !window.location.hash ) {
        var btn_href = holder.children('.categ.act').attr('href');
        var layout = 'list';
        if( btn_href ) {
            btn_href = btn_href.split('#');
            if( btn_href[1] ) {
                layout = dt_pajax_obj.parse_hash(btn_href[1]);
                layout = layout[2];
            }
        }else if( dt_ajax.layout ) {
            layout = dt_ajax.layout;
        }

        window.location.hash = 'all/1/' + layout;
		
    }
    window.onhashchange();
	window.lastGrid = window.location.hash.substr(window.location.hash.length - 4);
	if( lastGrid == "grid" ){
	
		jQuery('.gallery').addClass('grid');
		
	}else{
		
		jQuery('.gallery').removeClass('grid');
		
	}
    hash_orig = dt_pajax_obj.parse_hash(window.location.hash);
    
    holder.find('a.filter-button').not('.categ').each(function(){
        if( hash_orig && (-1 != jQuery(this).attr('href').search(hash_orig[0])) ) {
            holder.find("a.filter-button.act").not('.categ').removeClass("act");
            jQuery(this).addClass("act");
        }
        
        jQuery(this).on('click', function(){
            
            if( jQuery(this).hasClass('act') ) {
                return false;
            }
            
            // reassign act class properly
            holder.find("a.filter-button.act").not('.categ').removeClass("act");
            jQuery(this).addClass("act");
        });
    });

    // remove window.onhashchange handler wen layout switcher is clicked
    holder.find('.categ').each( function() {
        if( hash_orig && (-1 != jQuery(this).attr('href').search(hash_orig[2])) ) {
            holder.find(".categ.act").removeClass("act");
            jQuery(this).addClass("act");
        }
        
        jQuery(this).on('click', function(e) {
            if( jQuery(this).hasClass('act') ) {
                return false;
            }
            e.preventDefault();
            window.location.hash = '#'+jQuery(this).attr('href').split('#')[1];

            // reassign act class properly
            holder.find("a.categ.act").removeClass("act");
            jQuery(this).addClass("act");
            return false;
        }); 
    });
	

}// dt_portfolio_ajax end

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
jQuery(document).ready(function() {

    if( jQuery('.dt-ajax-content').length ) {
        dt_portfolio_ajax();
    }

    if( jQuery('#comments .comments-container').length ) {
        jQuery('#comments .comments-container').find('.children').each(function() {
            jQuery(this).children('.comment:last').addClass('last');
        });
    }

});
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//hover arrow
jQuery( function($) {

	//window.theTest = 0;
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	
	
})
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// change appereance on resize 

jQuery( function($) {
	//custome menu
	$('.custom-menu li').each(function(){
		if( $(this).children('.sub-menu').length ){
			$(this).addClass('children');
		}else{
			$(this).removeClass('children');
		}
	});
	
	if($('#aside').hasClass('left')){
		$('#container').addClass('right')
	}
	else{
		$('#container').removeClass('right')
	}
	//responsive
	$(window).bind('orientationchange', function(event) { 		
		$(".textwidget").removeClass("is-clicked");
		doSize();
		//$(window).trigger("resize");
	})
	//**********************************************************************************************************************************************
	
	function isiPhone(){
		return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
		);
	}
	
	$('.mob .cont-inf').on('click', function(e){				
		e.preventDefault();		
		if( $(this).hasClass('hide-cont') ){
			$('.cont-inf').removeClass('hide-cont');									
			$('.mob .contact-cont ').fadeOut(300);	
			return false;
		}else{
			$('.mob .contact-cont ').fadeIn(300);
			$(this).addClass('hide-cont');
			return false;	
		};
					
	});	
	$('.mob .cont-cross').on('click', function(e){					
		e.preventDefault();					
		$('.mob .contact-cont ').fadeOut(300);
		$('.cont-inf').removeClass('hide-cont');
		return false;	
	});	
	 var resizeTimeout = false;
	$(window).on("resize", function() {
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(function() {
			dtStorage.resizeCounter++;

			if ($(window).width() == dtStorage.theWidth) return false;
			
			dtStorage.theWidth = $(window).width();

			doSize();
			$(".textwidget").removeClass("is-clicked");	
			if(agentID || isAndroid || isiPhone){}
			else {
				doHover(); // 2review
			}
					
			
			//Call to action width
			$('.about-cont').each(function(){
				if($('.but-wrap', this).length){
					$('.about-iiner', this).css({
						'maxWidth':$(this).width() - $('.but-wrap', this).width() - 16,
						'minWidth':$('.about-cont').width() - $('.but-wrap', this).width() - 16
					})
				}
				else{
					$('.about-iiner', this).css({
						'maxWidth':100 + '%',
						'minWidth':100 + '%'
					})
				}
			})
			/*****************************************************************************/
			//widget popular posts
			$('.post-bg').each(function(){
				var post_w = $(this).width();
				var img = $(this).find('img');
				var img_w = img.width();
				$('.post-inner', this).css({
					width: post_w - img_w - 21
				})
			})
			/****************************************************************************/

			//max-width for soc-ico
			if(window.innerWidth < 739){
				$('.soc-ico').css({
					'max-width' : $('.top-cont').width() - $('.contact-block').innerWidth() - 15 +'px',
					'visibility':'visible'
				});
				$('#top-bg .search-f').css({
					'visibility':'visible'
				});
			}else{
				$('.soc-ico').css({
					'max-width' : $('.top-cont').width() - $('.contact-block').innerWidth() - $('.search-f').innerWidth() - 70 +'px',
					'visibility':'visible'
				});
				$('#top-bg .search-f').css({
					'visibility':'visible'
				});
			};
			if( parseInt($('.soc-ico').css('max-width')) < 23){
				$('.soc-ico').hide();
			}else{
				$('.soc-ico').show();
			}
			var inner_w = $('.inner-navig').width();
			if(('.inner-navig').length){
				$('#container > h1').css({
					'maxWidth':$('#container').width() - 40 - inner_w
				})
			}
			else{
			}

			$(".slider-shortcode").each(function () {
				var im=$(this).find("img");
				var im_w = $(this).width();
				var im_h = $(this).height();
			
				$('.html-caption', this).css({
					'width': im_w -36
				}).show()
				/*$('.nivo-caption, .html-caption', this).find('p').css({
					'maxHeight': im_h/2 
				});*/
			
			});
			var winHeight = window.innerHeight ? window.innerHeight : $(window).height();
			if( winHeight < 300 ){
				
				$('.menu-wrap').css({
					height: $('.mobile-menu').height() - 40,
					'minHeight': winHeight - 40
				});
				$('.menu-container').css({
					'paddingBottom': 80
				});
				
			} else {
				$('.menu-wrap').css({
					height: $('.mobile-menu').height() - 40,
					'minHeight': winHeight - 40
				});
				
				$('.menu-container').css({
					'paddingBottom': 20
				});
			};
			/*$(".carouFredSel_1").each(function() {
				var $this = $(this);
				$this.trigger("updateSizes");		
			});*/
			if(dtStorage.resizeCounter > 1){
				if ( $('.slider1').length > 0 ){
					$('.slider1').each(function() {
						$(this).data("carousel").reloadShow();
					});
				};
				
				if ( $('.sliderBx').length > 0 ){
					$('.sliderBx').each(function() {
						$(this).data("carousel").reloadShow();
					});
				};
			};
			
		}, 300);
	})//.trigger("resize");
	
})
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//mobile menu

/*Ipad scroll*/
jQuery.extend(jQuery.browser,
 {SafariMobile : navigator.userAgent.toLowerCase().match(/iP(hone|ad)/i) }
);

jQuery(function($){		
	//Hide overlay and mobile menu
	$('.overlay').animate({
		opacity: 0 }, 400, function() {
	});
	$('.mobile-menu ').animate({
		top: '-10000px' }, 800, function() {
	});
	//*************************************************
		
	//Click on menu button
	$('#main-menu .button').on('click', function(e){
		if( dtStorage.isAndroid ){			
			$("body").addClass('dt-mob-andr');
		}else{
			$("body").removeClass('dt-mob-andr');
		};

		$('.mobile-menu ').css('display', 'block');
		$('nav').css('display', 'none');		

		e.preventDefault();
		$('html').addClass('no-scroll');
			
		$('.overlay').show().animate({ 
			opacity: 1 }, 400, function() {
		});

		$('.mobile-menu ').animate({
			top: '0px' }, 800, function() {


			dtStorage.ul_menu_h = $('.menu-container').height();
			if( dtStorage.isiPad){
				//html.onscroll = function() { alert("Scrolled html"); };
				$(window).on('scroll', function(e){
					e.stopPropagation();
					$scrollTarget = $(e.target);
					if ( dtStorage.ul_menu_h < $(window).height()) {
						e.preventDefault();
						return;
					};
				});
			};

			//Prevent for body scroll
			if( dtStorage.isiPad){
				$(window).on('scroll',function(e){
					$scrollTarget = $(e.target);
					if ($('.overlay').has($scrollTarget).length) {
						e.preventDefault();
						return;
					};
					/*$('.overlay').on('touchstart', function(e){
						e.preventDefault();
						e.stopPropagation();
					});*/
				});
				$(window).on('scroll', function(e){
					//e.stopPropagation();
					$scrollTarget = $(e.target);
					if (!($scrollTarget.parents(".menu-wrap").length > 0)) {
						e.preventDefault();
						return;
					};

				});
			};

			/*if( dtStorage.isiPhone ){
				$(window).bind('orientationchange resize', function(event){
					window.scrollTo(0, 0);
				});	
			};*/
		});

		$('.menu-wrap').css({
			height: $('.mobile-menu').height() - 40
		});

		
	});
	//$(window).unbind('scrollstart');
	//Close mobile menu
	$('.mobile-menu .cross, .overlay').on('click, tap', function(){
		$('html').removeClass('no-scroll');
		//alert('cross click')
		$('nav').css('display', 'block');
		$('.overlay').show().animate({ 
			opacity: 0}, 800, function() {
		});
		$('.mobile-menu').animate({
			top:'-10000px' }, 800, function() {
				if( dtStorage.isiPad){
					$(window).unbind('scroll');
				}
		});
		setTimeout(function(){			 
			$('.overlay').hide();
		},1000);
	});
	$('.mobile-menu .cross').on('tap', function(){
		//alert('cross tap')
	});
	//Add class children
	$('.menu-container').find('li').each(function(){
		var $_this = $(this);
		if ($_this.find("div").length > 0) {
			$_this.addClass('children');
		}
		else{
			$_this.removeClass('children');
		};
	});
	//Append elements
	$('<span class="toggle-ico"></span>').insertAfter('.menu-container li.children > a');
	$('<i class="current-ico">&#10004;</i>').insertAfter('.menu-container a.current-menu-item span.inner-item');
	
	//Add class act for li
	$(".menu-container").find(' li.children').each(function () {
		var $_this = $(this);
		if($_this.children('a').hasClass('act')){
			$_this.addClass('act');
		}
		else{
			$_this.removeClass('act');
		};

		$(".menu-container li a.act").siblings('div').css('display','block');		
		
		if($_this.hasClass('act')){			
			$_this.children('.toggle-ico').removeClass('plus').addClass('minus');
		}
		else{
			$_this.children('.toggle-ico').removeClass('minus').addClass('plus');
		};		
	});

	//Show-hide sub menu
	$(".menu-container li").find(' .toggle-ico').each(function () {
		var $_this = $(this);
		$_this.on('click', function() {
			if($_this.hasClass('minus')) {
				$_this.siblings('div').stop(true, true).slideUp(300, function(){dtStorage.ul_menu_h = $('.menu-container').height();});
				$_this.parent().removeClass('act');
				$_this.removeClass('minus').addClass('plus');
			}
			else{
				$_this.parent('li').addClass('act');		
				$_this.siblings('div').stop(true, true).slideDown(800, function(){dtStorage.ul_menu_h = $('.menu-container').height();});
				$_this.removeClass('plus').addClass('minus');
			};
		});
	});

	//Click
	$('.menu-container').find('li.children > a').each(function() {
		
		var $this = $(this);
		$(".menu-container li a.act").next('div').css('display','block');
		$this.on('click', function(e) {
			if($(this).hasClass('click-auto')){
				if($this.parent().hasClass('act')){
						return false;							
				}
				else{
					e.preventDefault();
					$this.parent().addClass('act');		
					$this.siblings('div').stop(true, true).slideDown(800, function(){dtStorage.ul_menu_h = $('.menu-container').height();});					
					$this.siblings('.toggle-ico').removeClass('plus').addClass('minus');
					$this.bind('click', function(){
							return false;
					});	
				};
			}
			else{
				if($this.parent().hasClass('act')){
						window.location = this.href;
							return false;							
				}
				else{
					e.preventDefault();
					$this.parent().addClass('act');		
					$this.siblings('div').stop(true, true).slideDown(800, function(){dtStorage.ul_menu_h = $('.menu-container').height();});					
					$this.siblings('.toggle-ico').removeClass('plus').addClass('minus');
					$this.bind('click', function(){
						window.location = this.href;
							return false;
					});	
				};
			};
		});		
	});

//scroll for iphone android
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
	
	if( dtStorage.isiPad || dtStorage.isiPhone ){

		$('.menu-wrap').addClass('trans-z');		

	}else if( isAndroid ){
		jQuery('.overlay-mask').css('display', 'none')
		jQuery.fn.oneFingerScroll = function() {
			var scrollStartPos = 0;
			$(this).bind('touchstart', function(event) {				
				// jQuery clones events, but only with a limited number of properties for perf reasons. Need the original event to get 'touches'
				var e = event.originalEvent;
				scrollStartPos = $(this).scrollTop() + e.touches[0].pageY;
				//e.preventDefault();
			});
		
			$(this).bind('touchmove', function(event) {
				
				var e = event.originalEvent;
				$(this).scrollTop(scrollStartPos - e.touches[0].pageY );
				e.preventDefault();
			});
			return this;
		};
		$('.menu-wrap').oneFingerScroll();
		//usage
	}else{$('.menu-wrap').removeClass('trans-z');};	
	if (/(iPhone|iPod|iPad)/i.test(navigator.userAgent)) {
	    if (/OS [1-5](.*) like Mac OS X/i.test(navigator.userAgent)) {
			$('.menu-wrap').removeClass('trans-z');
			jQuery.fn.oneFingerScroll = function() {
			var scrollStartPos = 0;
			$(this).bind('touchstart', function(event) {				
				// jQuery clones events, but only with a limited number of properties for perf reasons. Need the original event to get 'touches'
				var e = event.originalEvent;
				scrollStartPos = $(this).scrollTop() + e.touches[0].pageY;
				//e.preventDefault();
			});
		
			$(this).bind('touchmove', function(event) {
				
				var e = event.originalEvent;
				$(this).scrollTop(scrollStartPos - e.touches[0].pageY );
				e.preventDefault();
			});
			return this;
		};
		$('.menu-wrap').oneFingerScroll();
	    }
	}
	//**************************************************************************************************	
	//Position fixed for menu button

});

jQuery(function($) {
	$(window).trigger("resize");
});

/*
 * Add animation effect for the tail in search.php
 */
function dt_add_tail_animation ( elements ) {
	if ( elements.length > 0 ) {
		
		var overfTimeout = false,
			remCTimeout = false,					
			addCTimeout = false,
			removeTimeout = false;

		jQuery(".textwidget-photo", elements).hover(
			function() {		
				var _this = jQuery(this);
				_this.addClass("is-hovered");

				clearTimeout(remCTimeout);
				
				remCTimeout = setTimeout(function() {
					if ( _this.hasClass( "is-hovered" ) ) {
						_this.addClass( "is-visible" );
						_this.find( '.animateArrow' ).addClass( 'bounceInDown' );
						setTimeout( function() { jQuery( '.arrows-nav-two' ).css( 'overflow', 'visible' ); }, 500 );
					}
				}, 100);
			}, function() {
				var _this = jQuery( this );
				_this.removeClass( "is-hovered" );

				clearTimeout( remCTimeout );
				clearTimeout( addCTimeout );

				addCTimeout = setTimeout( function() {
					if ( !_this.hasClass( "is-hovered" ) ) {
						jQuery('.animateArrow').removeClass('bounceInDown');
						if (_this.hasClass("is-visible")) {
							_this.removeClass("is-visible");
							_this.find('.animateArrow').addClass('bounceInUp');
							setTimeout(function() { jQuery('.arrows-nav-two').css('overflow', 'hidden'); }, 300);
							setTimeout(function() { jQuery('.animateArrow').removeClass('bounceInUp'); }, 500);
						}
					}
				}, 100);
			}
		);
		
		var i = elements.find(" > img");
		var i_w = i.width();
		var i_h = i.height();
		jQuery('i.fade', elements).css('width', i_w);
		jQuery('i.fade', elements).css('height', i_h);
		i = null;
	}
}