<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<head>
<title>Manual del Empleado</title>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="{{asset('web/assets/pages-manual/extras/jquery.min.1.7.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/pages-manual/extras/modernizr.2.5.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/pages-manual/lib/hash.js')}}"></script>

</head>
<body>

<div id="canvas">

<div class="zoom-icon zoom-icon-in"></div>

<div class="magazine-viewport">
	<div class="container">
		<div class="magazine">
			<!-- Next button -->
			<div ignore="1" class="next-button"></div>
			<!-- Previous button -->
			<div ignore="1" class="previous-button"></div>
		</div>
	</div>
</div>

<!-- Thumbnails -->
<div class="thumbnails">
	<div>
		<ul>
			<li class="i">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/1.jpg')}}" width="76" height="100" class="page-1">
				<span>1</span>
			</li>
			<li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/2-thumb.jpg')}}" width="76" height="100" class="page-2">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/3-thumb.jpg')}}" width="76" height="100" class="page-3">
				<span>2-3</span>
			</li>
			<li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/4-thumb.jpg')}}" width="76" height="100" class="page-4">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/5-thumb.jpg')}}" width="76" height="100" class="page-5">
				<span>4-5</span>
			</li>
			<li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/6-thumb.jpg')}}" width="76" height="100" class="page-6">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/7-thumb.jpg')}}" width="76" height="100" class="page-7">
				<span>6-7</span>
			</li>
			<li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/8-thumb.jpg')}}" width="76" height="100" class="page-8">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/9-thumb.jpg')}}" width="76" height="100" class="page-9">
				<span>8-9</span>
			</li>
			<li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/10-thumb.jpg')}}" width="76" height="100" class="page-10">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/11-thumb.jpg')}}" width="76" height="100" class="page-11">
				<span>10-11</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-12">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-13">
				<span>12-13</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-14">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-15">
				<span>14-15</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-16">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-17">
				<span>16-17</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-18">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-19">
				<span>18-19</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-20">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-21">
				<span>20-21</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-22">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-23">
				<span>22-23</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-24">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-25">
				<span>24-25</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-26">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-27">
				<span>26-27</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-28">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-29">
				<span>28-29</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-30">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-31">
				<span>30-31</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-32">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-33">
				<span>32-33</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-34">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-35">
				<span>34-35</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-36">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-37">
				<span>36-37</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-38">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-39">
				<span>38-39</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-40">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-41">
				<span>40-41</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-42">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-43">
				<span>42-43</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-44">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-45">
				<span>44-45</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-46">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-47">
				<span>46-47</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-48">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-49">
				<span>48-49</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-50">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-51">
				<span>50-51</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-52">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-53">
				<span>52-53</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-54">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-55">
				<span>54-55</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-56">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-57">
				<span>56-57</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-58">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-59">
				<span>58-59</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-60">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-61">
				<span>60-61</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-62">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-63">
				<span>62-63</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-64">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-65">
				<span>64-65</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-66">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-67">
				<span>66-67</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-68">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-69">
				<span>68-69</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-70">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-71">
				<span>70-71</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-72">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-73">
				<span>72-73</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-74">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-75">
				<span>74-75</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-76">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-77">
				<span>76-77</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-78">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-79">
				<span>78-79</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-80">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-81">
				<span>80-81</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-82">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-83">
				<span>82-83</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-84">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-85">
				<span>84-85</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-86">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-87">
				<span>86-87</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-88">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-89">
				<span>88-89</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-90">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-91">
				<span>90-91</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-92">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-93">
				<span>92-93</span>
			</li>
            <li class="d">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/12-thumb.jpg')}}" width="76" height="100" class="page-94">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/13-thumb.jpg')}}" width="76" height="100" class="page-95">
				<span>94-95</span>
			</li>
			<li class="i">
				<img src="{{asset('web/assets/pages-manual/samples/magazine/pages/14-thumb.jpg')}}" width="76" height="100" class="page-96">
				<span>96</span>
			</li>
		<ul>
	<div>
</div>
</div>

<script type="text/javascript">
const conector = "{{asset('web/assets/pages-manual')}}";
function loadApp() {

 	$('#canvas').fadeIn(1000);

 	var flipbook = $('.magazine');

 	// Check if the CSS was already loaded

	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}

	// Create the flipbook

	flipbook.turn({

			// Magazine width

			width: 922,

			// Magazine height

			height: 600,

			// Duration in millisecond

			duration: 1000,

			// Hardware acceleration

			acceleration: !isChrome(),

			// Enables gradients

			gradients: true,

			// Auto center this flipbook

			autoCenter: true,

			// Elevation from the edge of the flipbook when turning a page

			// elevation: 50,

			// The number of pages

			pages: 96,

			// Events

			when: {
				turning: function(event, page, view) {

					var book = $(this),
					currentPage = book.turn('page'),
					pages = book.turn('pages');

					// Update the current URI

					Hash.go('page/' + page).update();

					// Show and hide navigation buttons

					disableControls(page);


					$('.thumbnails .page-'+currentPage).
						parent().
						removeClass('current');

					$('.thumbnails .page-'+page).
						parent().
						addClass('current');



				},

				turned: function(event, page, view) {

					disableControls(page);

					$(this).turn('center');

					if (page==1) {
						$(this).turn('peel', 'br');
					}

				},

				missing: function (event, pages) {

					// Add pages that aren't in the magazine

					for (var i = 0; i < pages.length; i++)
						addPage(pages[i], $(this));

				}
			}

	});

	// Zoom.js

	$('.magazine-viewport').zoom({
		flipbook: $('.magazine'),

		max: function() {

			return largeMagazineWidth()/$('.magazine').width();

		},

		when: {

			swipeLeft: function() {

				$(this).zoom('flipbook').turn('next');

			},

			swipeRight: function() {

				$(this).zoom('flipbook').turn('previous');

			},

			resize: function(event, scale, page, pageElement) {

				if (scale==1)
					loadSmallPage(page, pageElement);
				else
					loadLargePage(page, pageElement);

			},

			zoomIn: function () {

				$('.thumbnails').hide();
				$('.made').hide();
				$('.magazine').removeClass('animated').addClass('zoom-in');
				$('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');

				if (!window.escTip && !$.isTouch) {
					escTip = true;

					$('<div />', {'class': 'exit-message'}).
						html('<div>Press ESC to exit</div>').
							appendTo($('body')).
							delay(2000).
							animate({opacity:0}, 500, function() {
								$(this).remove();
							});
				}
			},

			zoomOut: function () {

				$('.exit-message').hide();
				$('.thumbnails').fadeIn();
				$('.made').fadeIn();
				$('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');

				setTimeout(function(){
					$('.magazine').addClass('animated').removeClass('zoom-in');
					resizeViewport();
				}, 0);

			}
		}
	});

	// Zoom event

	if ($.isTouch)
		$('.magazine-viewport').bind('zoom.doubleTap', zoomTo);
	else
		$('.magazine-viewport').bind('zoom.tap', zoomTo);


	// Using arrow keys to turn the page

	$(document).keydown(function(e){

		var previous = 37, next = 39, esc = 27;

		switch (e.keyCode) {
			case previous:

				// left arrow
				$('.magazine').turn('previous');
				e.preventDefault();

			break;
			case next:

				//right arrow
				$('.magazine').turn('next');
				e.preventDefault();

			break;
			case esc:

				$('.magazine-viewport').zoom('zoomOut');
				e.preventDefault();

			break;
		}
	});

	// URIs - Format #/page/1

	Hash.on('^page\/([0-9]*)$', {
		yep: function(path, parts) {
			var page = parts[1];

			if (page!==undefined) {
				if ($('.magazine').turn('is'))
					$('.magazine').turn('page', page);
			}

		},
		nop: function(path) {

			if ($('.magazine').turn('is'))
				$('.magazine').turn('page', 1);
		}
	});


	$(window).resize(function() {
		resizeViewport();
	}).bind('orientationchange', function() {
		resizeViewport();
	});

	// Events for thumbnails

	$('.thumbnails').click(function(event) {

		var page;

		if (event.target && (page=/page-([0-9]+)/.exec($(event.target).attr('class'))) ) {

			$('.magazine').turn('page', page[1]);
		}
	});

	$('.thumbnails li').
		bind($.mouseEvents.over, function() {

			$(this).addClass('thumb-hover');

		}).bind($.mouseEvents.out, function() {

			$(this).removeClass('thumb-hover');

		});

	if ($.isTouch) {

		$('.thumbnails').
			addClass('thumbanils-touch').
			bind($.mouseEvents.move, function(event) {
				event.preventDefault();
			});

	} else {

		$('.thumbnails ul').mouseover(function() {

			$('.thumbnails').addClass('thumbnails-hover');

		}).mousedown(function() {

			return false;

		}).mouseout(function() {

			$('.thumbnails').removeClass('thumbnails-hover');

		});

	}


	// Regions

	if ($.isTouch) {
		$('.magazine').bind('touchstart', regionClick);
	} else {
		$('.magazine').click(regionClick);
	}

	// Events for the next button

	$('.next-button').bind($.mouseEvents.over, function() {

		$(this).addClass('next-button-hover');

	}).bind($.mouseEvents.out, function() {

		$(this).removeClass('next-button-hover');

	}).bind($.mouseEvents.down, function() {

		$(this).addClass('next-button-down');

	}).bind($.mouseEvents.up, function() {

		$(this).removeClass('next-button-down');

	}).click(function() {

		$('.magazine').turn('next');

	});

	// Events for the next button

	$('.previous-button').bind($.mouseEvents.over, function() {

		$(this).addClass('previous-button-hover');

	}).bind($.mouseEvents.out, function() {

		$(this).removeClass('previous-button-hover');

	}).bind($.mouseEvents.down, function() {

		$(this).addClass('previous-button-down');

	}).bind($.mouseEvents.up, function() {

		$(this).removeClass('previous-button-down');

	}).click(function() {

		$('.magazine').turn('previous');

	});


	resizeViewport();

	$('.magazine').addClass('animated');

}

// Zoom icon

 $('.zoom-icon').bind('mouseover', function() {

 	if ($(this).hasClass('zoom-icon-in'))
 		$(this).addClass('zoom-icon-in-hover');

 	if ($(this).hasClass('zoom-icon-out'))
 		$(this).addClass('zoom-icon-out-hover');

 }).bind('mouseout', function() {

 	 if ($(this).hasClass('zoom-icon-in'))
 		$(this).removeClass('zoom-icon-in-hover');

 	if ($(this).hasClass('zoom-icon-out'))
 		$(this).removeClass('zoom-icon-out-hover');

 }).bind('click', function() {

 	if ($(this).hasClass('zoom-icon-in'))
 		$('.magazine-viewport').zoom('zoomIn');
 	else if ($(this).hasClass('zoom-icon-out'))
		$('.magazine-viewport').zoom('zoomOut');

 });

 $('#canvas').hide();


// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	// yep: ['../../lib/turn.js'],
	// nope: ['../../lib/turn.html4.min.js'],
	// both: ['../../lib/zoom.min.js', 'js/magazine.js', 'css/magazine.css'],
    yep: ["{{asset('web/assets/pages-manual/lib/turn.js')}}"],
	nope: ["{{asset('web/assets/pages-manual/lib/turn.html4.min.js')}}"],
	both: ["{{asset('web/assets/pages-manual/lib/zoom.min.js')}}", "{{asset('web/assets/pages-manual/samples/magazine/js/magazine.js')}}", "{{asset('web/assets/pages-manual/samples/magazine/css/magazine.css')}}"],
    complete: loadApp
});

</script>

</body>
</html>
