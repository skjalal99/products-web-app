
$(document).ready(function(){
    //  alert("alert message");
  
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
            $("#search-size").on("click", function() {
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

          
// ===========dataTables initializations============

    // $('#specification_tbl').DataTable(); // tiles table
    var table1 = $('#specification_tbl').dataTable( {
        // scrollY:        "300px",
        // scrollX:        true,
        // scrollCollapse: true,
        // ordering:       true,
        // paging:         true,
        fixedColumns: {
          left: 3
      }
        // "columnDefs": [
        //   { "width": "50%", "targets": 1 }
        // ]
    } );



    
// ===========dataTables ends============



$("#specification_tbl").on("click", ".modalc1", function() {
// $(".modalc1").on("click",function(e){
    // this code will run only on first pagination so use table id as well
//     e.preventDefault(); // 

    var did = $(this).attr('data-id');
    var dmodal = $(this).attr('data-model');
    console.log(did,dmodal);

   

        $.ajax({
            url: "modal_tiles-A.php",
            type: 'post',
            data: {
                did: did,
                dmodal: dmodal

            },
            dataType: 'json',
            success: function (data, status) {
                 var dm = data[0];
                 $('#WallModalLabel').text(dm['tile_model_no'] +' Tile Details');
                 $('#mno').text(dm['tile_model_no']);
                 $('#mat').text(dm['material']);
                 $('#type').text(dm['type']);
                 $('#effect').text(dm['effect']);
                 $('#color').text(dm['color']);
                 $('#finish').text(dm['surface']);
                 $('#size').text(dm['sizes']);
                 $('#thick').text(dm['cm']+'cm /' + dm['thickness']+'mm');
                 $('#qb').text(dm['qty_per_box']);
                 $('#area').text(dm['usage']);
                 console.log('successss1');

            }
        });
        //tiles ajax ends

        $.ajax({
            url: "modal_prop-A.php",
            type: 'post',
            data: {
                did: did,
                  },
           // dataType: 'json',
            success: function (data2, status) {
               console.log(data2);
               
                $('.mod_prop1').html(data2);
             
            }
        });
        //tiles properties ajax ends

        $.ajax({
            url: "modal_img-A.php",
            type: 'post',
            data: {
                did1: did,
                  },
           dataType: 'json',
            success: function (data3, status) {
            //   console.log(data3[0].image_thumb);

               var x1 = data3
                for(i=0; i<x1.length; i++)
                    {
                        if(i== 0){
                            var mainI  = $("<div class='carousel-item active'><img src='../assets/images/modals/" + x1[i].image_thumb +"'class='d-block w-100'></div>")  
                        }
                        else
                        {
                            var mainI  = $("<div class='carousel-item '><img src='../assets/images/modals/" + x1[i].image_thumb +"'class='d-block w-100'></div>")  
                        }
                        $('#cInner').append(mainI);           
                    
                    // var XImgs = $("<div><img src='../assets/images/modals/" +  x[i].image_thumb +"' width='50'></div>");
                    var XImgs1 = $("<li data-bs-target='#WallModalIndicators' data-bs-slide-to='"+i+"' class='active thumbnail'><img src='../assets/images/modals/" + x1[i].image_thumb +"' width='50' class='d-block w-100'></li>");
                                // console.log(XImgs1);
                        
                    $('#cIndicator').append(XImgs1);

                    
                        
                    }   
                //$('.mod_prop1').html(data2);
             
            }
        });
        //tiles properties ajax ends

        $('#WallModal').modal('toggle');
            $('#cInner').empty();
            $('#cIndicator').empty();
     
 });


// Data Table ends....

// Category Modal view starts....


$(".modal-view").on("click",function() {
    // $(".modalc1").on("click",function(e){
        // this code will run only on first pagination so use table id as well
    //     e.preventDefault(); // 
    
        var did = $(this).attr('data-id');
        var dmodal = $(this).attr('data-model');
        console.log(did,dmodal);
    
       
    
            $.ajax({
                url: "modal_tiles-A.php",
                type: 'post',
                data: {
                    did: did,
                    dmodal: dmodal
    
                },
                dataType: 'json',
                success: function (data, status) {
                     var dm = data[0];
                     $('#WallModalLabel').text(dm['tile_model_no'] +' Tile Details');
                     $('#mno').text(dm['tile_model_no']);
                     $('#mat').text(dm['material']);
                     $('#type').text(dm['type']);
                     $('#effect').text(dm['effect']);
                     $('#color').text(dm['color']);
                     $('#finish').text(dm['surface']);
                     $('#size').text(dm['sizes']);
                     $('#thick').text(dm['cm']+'cm /' + dm['thickness']+'mm');
                     $('#qb').text(dm['qty_per_box']);
                     $('#area').text(dm['usage']);
                     console.log('successss1');
    
                }
            });
            // //tiles ajax ends
    
            $.ajax({
                url: "modal_prop-A.php",
                type: 'post',
                data: {
                    did: did,
                      },
               // dataType: 'json',
                success: function (data2, status) {
                   console.log(data2);
                   
                    $('.mod_prop1').html(data2);
                 
                }
            });
            // //tiles properties ajax ends
    
            $.ajax({
                url: "modal_img-A.php",
                type: 'post',
                data: {
                    did1: did,
                      },
               dataType: 'json',
                success: function (data3, status) {
               console.log(data3[0].image_thumb);
    
                   var x1 = data3
                    for(i=0; i<x1.length; i++)
                        {
                            if(i== 0){
                                var mainI1  = $("<div class='carousel-item active'><img src='../assets/images/modals/" + x1[i].image_thumb +"'class='d-block w-100'></div>")  
                            }
                            else
                            {
                                var mainI1  = $("<div class='carousel-item '><img src='../assets/images/modals/" + x1[i].image_thumb +"'class='d-block w-100'></div>")  
                            }
                            var cii = $('#cInner').append(mainI1); 
                                     
                        
                        // var XImgs = $("<div><img src='../assets/images/modals/" +  x[i].image_thumb +"' width='50'></div>");
                        var XImgs1 = $("<li data-bs-target='#WallModalIndicators' data-bs-slide-to='"+i+"' class='active thumbnail'><img src='../assets/images/modals/" + x1[i].image_thumb +"' width='50' class='d-block w-100'></li>");
                                    // console.log(XImgs1);
                            
                        $('#cIndicator').append(XImgs1);
    
                        
                            
                        }   
                    $('.mod_prop1').html(data2);
                 
                }
            });
            // //tiles properties ajax ends
    
            $('#WallModal').modal('toggle');
                $('#cInner').empty();
                $('#cIndicator').empty();
         
     });

     //Category Modal view ends















 
       

});
