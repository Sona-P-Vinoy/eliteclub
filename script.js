$(document).ready(function(){
	$(window).scroll(function(){
		if(this.scrollY > 20){
			$('.navbar').addClass("sticky");
		}
		else{
			$('.navbar').removeClass("sticky");
		}
		if ($(this).scrollTop() > 100) {
			$('.scroll-top').fadeIn();
		} else {
			$('.scroll-top').fadeOut();
		}
	});

	//slide-up script
	$('.scroll-top').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 100);
		return false;
	});


	//toggle menu/navbar script
	$('.menu-btn').click(function(){
		$('.navbar .menu').toggleClass("active");
		$('.menu-btn i').toggleClass("active");
	});


		 //typing animation script

		/*var typed = new Typed('.typing',{
		strings:["Look Better","Beautiful You"],
		typeSpeed:100,
		backSpeed:0,
		loop:true
	});*/
	document.addEventListener('DOMContentLoaded', function(){
		Typed.new('.type', {
			strings: ["neighbor", "family", "team", "community"],
			stringsElement: null,
		// typing speed
		typeSpeed: 60,
		// time before typing starts
		startDelay: 600,
		// backspacing speed
		backSpeed: 20,
		// time before backspacing
		backDelay: 500,
		// loop
		loop: true,
		// false = infinite
		loopCount: 5,
		// show cursor
		showCursor: false,
		// character for cursor
		cursorChar: "|",
		// attribute to type (null == text)
		attr: null,
		// either html or text
		contentType: 'html',
	});
	});

	//owl carousel script
	$('.carousel').owlCarousel({
		margin:20,
		loop:true,
		autoPlayTimeOut:2000,
		autoPlayHoverPause:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:2,
				nav:false
			},
			1000:{
				items:3,
				nav:false
			}
		}
	});

	

});


let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
	sidebar.classList.toggle("active");
	if(sidebar.classList.contains("active")){
		sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
	}else
	sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

