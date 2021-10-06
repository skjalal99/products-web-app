
$(document).ready(function(){
     alert("alert message");
  
			// grab the initial top offset of the navigation 
            var stickyNavTop = $('.nav-scr').offset().top;
		   	
            // our function that decides weather the navigation bar should have "fixed" css position or not.
            var stickyNav = function(){
             var scrollTop = $(window).scrollTop(); // our current vertical position from the top
                  
             // if we've scrolled more than the navigation, change its position to fixed to stick to top,
             // otherwise change it back to relative
             if (scrollTop > stickyNavTop) { 
                 $('.nav-scr').addClass('sticky');
             } else {
                 $('.nav-scr').removeClass('sticky'); 
             }
         };

         stickyNav();
         // and run it again every time you scroll
         $(window).scroll(function() {
             stickyNav();
         });


        //=========== card js starts===============

        //Count nr. of square classes
        var countSquare = $('.square').length;

        //For each Square found add BG image
        for (i = 0; i < countSquare; i++)
        {
            var firstImage = $('.square').eq([i]);
            var secondImage = $('.square2').eq([i]);

            var getImage = firstImage.attr('data-image');
            var getImage2 = secondImage.attr('data-image');

            firstImage.css('background-image', 'url(' + getImage + ')');
            secondImage.css('background-image', 'url(' + getImage2 + ')');
        }



       


       

});
