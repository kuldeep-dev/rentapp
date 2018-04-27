$(function(){
	// Window Height For All Screen //
	var h = $(window).height();
	$('.st_banner').css({"min-height":h+"px"});
	// Datepicker Function Include Here //
	//$( "#date-start, #date-end, #trip_start, #trip_end" ).datepicker({ minDate: 0 });
	



	
	// Range Slider Function Include Here //
	
	// Years Range Slider Function Include Here //
	$( "#years" ).slider({
		range: true,
		min: 1,
		max: 30,
		values: [ 10, 15 ],
		slide: function( event, ui ) {
		$("#year1").val( "$" + ui.values[ 0 ]);
		$("#year2").val( "$" + ui.values[ 1 ]);
		}
	});
	$( "#year1" ).val( "$" + $( "#years" ).slider( "values", 0 ) );
	$( "#year2" ).val( "$" + $( "#years" ).slider( "values", 1 ) );
	// Minimum Value Range Slider Function Include Here //
	$( "#distance-range" ).slider({
		range: "min",
		value: 10,
		min: 0,
		max: 1000,
		slide: function( event, ui ) {
		$( "#distance" ).val( "$" + ui.value );
		}
	});
	$( "#distance" ).val( "$" + $( "#distance-range" ).slider( "value" ) );
	// Minimum Market Value Range Slider Function Include Here //
	$( "#market" ).slider({
		range: "min",
		value: 5000,
		min: 0,
		max: 20000,
		slide: function( event, ui ) {
		$( "#market-value" ).val( "$" + ui.value );
		}
	});
	$( "#market-value" ).val( "$" + $( "#market" ).slider( "value" ) );
	// Minimum Days Per Month Range Slider Function Include Here //
	$( "#days" ).slider({
		range: "min",
		value: 15,
		min: 0,
		max: 31,
		slide: function( event, ui ) {
		$( "#days-value" ).val( "$" + ui.value );
		}
	});
	$( "#days-value" ).val( "$" + $( "#days" ).slider( "value" ) );
	// Searching Section Display None Or Block Function Include Here //
	$(".sr-map_sec").css("display","none");
	$("#map").click(function(){
		$('.sr-map_sec').css("display","block");
		$('.sr-inner_wrap').css("display","none");
		$("#map").addClass("active");
		$("#list").removeClass("active");
	});
	$("#list").click(function(){
		$('.sr-inner_wrap').css("display","block");
		$('.sr-map_sec').css("display","none");
		$("#list").addClass("active");
		$("#map").removeClass("active");
	});
	//Slick Slider Function Include Here //
	$(".slider-jet, .boats-slider, .fsboats-slider, .yacht-slider, .watersp-slider").slick({
		dots: false,
		infinite: true,
		autoplay:true,
		autoplaySpeed:3000,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					infinite: true,
					dots: true
					
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	// Booking Banner Js Include Here //
	$(".book-banner, .test_inner").slick({
		autoplay:true,
		autoplaySpeed:3000,
	});
});$(function(){
	// Window Height For All Screen //
	var h = $(window).height();
	$('.st_banner').css({"min-height":h+"px"});
	// Datepicker Function Include Here //
	//$( "#date-start, #date-end, #trip_start, #trip_end" ).datepicker({ minDate: 0 });
	



	
	// Range Slider Function Include Here //
	
	// Years Range Slider Function Include Here //
	$( "#years" ).slider({
		range: true,
		min: 1,
		max: 30,
		values: [ 10, 15 ],
		slide: function( event, ui ) {
		$("#year1").val( "$" + ui.values[ 0 ]);
		$("#year2").val( "$" + ui.values[ 1 ]);
		}
	});
	$( "#year1" ).val( "$" + $( "#years" ).slider( "values", 0 ) );
	$( "#year2" ).val( "$" + $( "#years" ).slider( "values", 1 ) );
	// Minimum Value Range Slider Function Include Here //
	$( "#distance-range" ).slider({
		range: "min",
		value: 10,
		min: 0,
		max: 1000,
		slide: function( event, ui ) {
		$( "#distance" ).val( "$" + ui.value );
		}
	});
	$( "#distance" ).val( "$" + $( "#distance-range" ).slider( "value" ) );
	// Minimum Market Value Range Slider Function Include Here //
	$( "#market" ).slider({
		range: "min",
		value: 5000,
		min: 0,
		max: 20000,
		slide: function( event, ui ) {
		$( "#market-value" ).val( "$" + ui.value );
		}
	});
	$( "#market-value" ).val( "$" + $( "#market" ).slider( "value" ) );
	// Minimum Days Per Month Range Slider Function Include Here //
	$( "#days" ).slider({
		range: "min",
		value: 15,
		min: 0,
		max: 31,
		slide: function( event, ui ) {
		$( "#days-value" ).val( "$" + ui.value );
		}
	});
	$( "#days-value" ).val( "$" + $( "#days" ).slider( "value" ) );
	// Searching Section Display None Or Block Function Include Here //
	$(".sr-map_sec").css("display","none");
	$("#map").click(function(){
		$('.sr-map_sec').css("display","block");
		$('.sr-inner_wrap').css("display","none");
		$("#map").addClass("active");
		$("#list").removeClass("active");
	});
	$("#list").click(function(){
		$('.sr-inner_wrap').css("display","block");
		$('.sr-map_sec').css("display","none");
		$("#list").addClass("active");
		$("#map").removeClass("active");
	});
	//Slick Slider Function Include Here //
	$(".slider-jet, .boats-slider, .fsboats-slider, .yacht-slider, .watersp-slider").slick({
		dots: false,
		infinite: true,
		autoplay:true,
		autoplaySpeed:3000,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					infinite: true,
					dots: true
					
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	// Booking Banner Js Include Here //
	$(".book-banner, .test_inner").slick({
		autoplay:true,
		autoplaySpeed:3000,
	});
});
