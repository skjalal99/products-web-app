
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


    // ============table js================

   // $('[data-toggle="tooltip"]').tooltip();
 
            $(".btn-group .btn").click(function(){
                var inputValue = $(this).find("input").val();
                if(inputValue != 'all'){
                    var target = $('table tr[data-status="' + inputValue + '"]');
                    $("table tbody tr").not(target).hide();
                    target.fadeIn();
                } else {
                    $("table tbody tr").fadeIn();
                }
            });
            // Changing the class of status label to support Bootstrap 4
            var bs = $.fn.tooltip.Constructor.VERSION;
            var str = bs.split(".");
            if(str[0] == 4){
                $(".label").each(function(){
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            }

            // Filter table rows based on searched term Size
            $("#search-size").on("change", function() {
                var term = $(this).val().toLowerCase();//alert(term);
                $("table tbody tr").each(function(){
                    $row = $(this);
                    var name = $row.find("td:nth-child(2)").text().toLowerCase();
                    console.log(name);
                    //alert(name);
                    if(name.search(term) < 0){                
                        $row.hide();
                    } else{
                        $row.show();
                    }
                });
            });
            // Filter table rows based on searched term Model
            $("#search-model").on("keyup", function() {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function(){
                    $row = $(this);
                    var name = $row.find("td:nth-child(3)").text().toLowerCase();
                    console.log(name);
                    //alert(name);
                    if(name.search(term) < 0){                
                        $row.hide();
                    } else{
                        $row.show();
                    }
                });
            });
            // Filter table rows based on searched term Categories
            $("#search-type").on("change", function() {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function(){
                    $row = $(this);
                    var name = $row.find("td:nth-child(7)").text().toLowerCase();
                    console.log(name);
                    //alert(name);
                    if(name.search(term) < 0){    
                      
                        $row.hide();
                    } else{
                        $row.show();
                    }
                });
            });

          






       

});
