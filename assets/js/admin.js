$(document).ready(function () {

  /* ========= sidebar toggle ======== */
  const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
  const mainWrapper = document.querySelector(".main-wrapper");
  const menuToggleButton = document.querySelector("#menu-toggle");
  const menuToggleButtonIcon = document.querySelector("#menu-toggle i");
  const overlay = document.querySelector(".overlay");

  menuToggleButton.addEventListener("click", () => {
    sidebarNavWrapper.classList.toggle("active");
    overlay.classList.add("active");
    mainWrapper.classList.toggle("active");

    if (document.body.clientWidth > 1200) {
      if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
        menuToggleButtonIcon.classList.remove("lni-chevron-left");
        menuToggleButtonIcon.classList.add("lni-menu");
      } else {
        menuToggleButtonIcon.classList.remove("lni-menu");
        menuToggleButtonIcon.classList.add("lni-chevron-left");
      }
    } else {
      if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
        menuToggleButtonIcon.classList.remove("lni-chevron-left");
        menuToggleButtonIcon.classList.add("lni-menu");
      }
    }
  });
  overlay.addEventListener("click", () => {
    sidebarNavWrapper.classList.remove("active");
    overlay.classList.remove("active");
    mainWrapper.classList.remove("active");
  });

  $('#menu-toggle').click(function(){
    $('#toggle-arrow').toggleClass("toggle-arrow");
   });


// ===========dataTables initializations============

    //$('#tbl_tiles').DataTable(); // tiles table
    var table = $('#tbl_tiles').dataTable( {
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





// =========manage size=========




	// Select/Deselect checkboxes

	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAllchecks").click(function(){
   
		if(this.checked)
    {
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else
    {
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAllchecks").prop("checked", false);
		}
	});


// =========== Menu Active class =========

// var list = '.menu li a';
var list = '.list1 ul li a';

$(list).on('click', function(){
alert("clicked");
 $(list).removeClass('active');
    $(this).addClass('active');
});

// =========== Tile model no. =========

$('.table-view-button').on('click',(function(e){

e.preventDefault();


  let view_id= $(this).attr('data-model');

  $('.tile-no').append(view_id);



}));

$('.close').on('click',(function(){

  
   $(this).attr('data-bs-dismiss');
   let view_id_close= $('.tile-no').empty();


}));

// ========== Categories Delete ==========
$(".delete-tbl").click(function () {
 var id1 = $(this).val();
 var type =$('#type-cat'+id1).text();
 var status =$('#stat-cat'+id1).text();

//  $($dele).modal(show);
 $('#id1').val(id1);
 $('#type-cat').val(type);
 $('#stat-del').val(status);

});

// ========== Categories Edit ==========

$(".edit-tbl").click(function () {

 var id2 = $(this).val();
 var type1 =$('#type-cat'+id2).text();
 var status1 =$.trim($('#stat-cat'+id2).text());
 $('#edit_id').val(id2);
 $('#edit_cat').val(type1);
 if(status1=="Active"){
  
   $('#edit_cat_stat1').prop('checked', true);
 }
 else{
  $('#edit_cat_stat2').prop('checked', true);
 }


});
//===========tiles upload delete=============
// ========== Categories Delete ==========
$(".del-tiles1").click(function () {
  var id2 = $(this).attr('data-id');
  var model_no1 = $(this).attr('value');
  $('#del-title1').text(model_no1);
  $('#del_tiles_up').val(id2);

  console.log(id2,model_no1);

 
 });
 

// ========== sizes delete ==========

  $(".del-tbl-size").click(function () {
    var id3 = $(this).val();
    var type3 =$('#sizes'+id3).text();
    var status3 =$.trim($('#cat-sizes'+id3).text());
   var ab= $('#id3').val(id3);
    $('#del-size').val(type3);
    $('#del-size-cat').val(status3);

  });

// ========== sizes Edit ==========

  $(".edit-tbl-size").click(function () {

    var id4 = $(this).val();
    var type4 =$('#sizes'+id4).text();
    var catsizes =$('#cat-sizes'+id4).text(); 

    var status4 =$.trim($('#sizes-status'+id4).text());
    $('#edit_id_sizes').val(id4);
    $('#edit_id_sizes').val(type4);

   


    if(status4=="Active"){
     
      $('#edit_size_stat1').prop('checked', true);
    }
    else{
     $('#edit_size_stat2').prop('checked', true);
    }

//category id from edit button
    var catid = $(this).attr('data-catid');
 
    $('#size_id1').val(id4);
    $('#cat_id1').val(catid);
    
   // Pass edit cat to select option categories to modal
    $('#sel-size-cat .dd').val(catid).text(catsizes);
    $('#sel-size-cat').change(function () {
      var optionSelected = $(this).find("option:selected");
      var valueSelected  = optionSelected.val();
      var textSelected   = optionSelected.text();

      // $('#sel-size-cat .dd').val(valueSelected).text(catsizes)
        $('#cat_id2').val(valueSelected);
        var b =  $('#cat_id2').val();
  
        });
   

      
  
   });
   //data-bs-target="#view-prop"

   //Ajax Properties modal

   $('.prop').on('click',(function(e){

    e.preventDefault();

    var prop_id = $(this).attr('data-id');

    $.ajax({

      url:"prop-A.php",
      type:'post',
      data:{
           id:prop_id,
      },
        success:function(data1,status)
        {
console.log(data1);
          $('.prop_modal').html(data1);

          // Display Modal
         $('#view-prop').modal('show'); 

         
        }


      }); //ajax ends

    })); //.prop ends

     // data-bs-toggle="modal" data-bs-target="#edit-tiles"

  // edit tiles : Ajax

     $('.edit-tiles').on('click',(function(e){

      e.preventDefault();
      
      var tiles_id = $(this).attr('data-tile-id');
      var size_id = $(this).attr('data-size-id');
      var cat_id = $(this).attr('data-cat-id');


// properties edit ajax starts

      $.ajax({

        url:"prop-A-edit.php",
        type:'post',
        data:{
            tiles_id_prop:tiles_id,
            
        },
        dataType:'json',  
        success: function(data2, status){



          // set x variable to data

          if(data2){
            x = data2;
          }
          else
          {
            x = "";
          }
          // get the json data in loop
          for(i=0; i<x.length; i++)
          {
            
            var prop_check_val = $('.check-box').val();
            $('.check-box').each(function(){
              var tex = $(this).val();
                 
              if(tex == x[i].id)
              {
               // cheked id compare to db and checked
                $('.check-box-edit'+ x[i].id).prop('checked',true);
               
              }
    
            });



          }//Loop Ends

        }//success ajax ends


      }); //ajax ends


      $.ajax({

          url:"tiles-edit-A.php",
          type:'post',
          data:{
              tiles_id:tiles_id,
              cat_id:cat_id,
              size_id:size_id,
          },
          dataType:'json',  
          success:function(data1,status)
          {
            $('#modelno-edit').val(data1[0]['tile_model_no']);
            $('#img-edit').attr('src','../../assets/images/tiles/'+ data1[0]['tile_img']).prop('width','100');
            $('#img-edit1').val(data1[0]['tile_img']);
            $('#cm-edit').val(data1[0]['cm']);
            $('#mm-edit').val(data1[0]['thickness']);
            $('#color-edit').val(data1[0]['color']);
            $('#effect-edit').val(data1[0]['effect']);
            $('#material-edit').val(data1[0]['material']);
            $('#qty-edit').val(data1[0]['qty_per_box']);
            $('#finish-edit').val(data1[0]['surface']);
            $('#type-edit').val(data1[0]['type']);
            $('#usage-edit').val(data1[0]['usage']);
            $('#cat-edit').val(data1[0]['catid']);
            $('#sizeid-edit').val(data1[0]['sizeid']);
            $('#tilesid-edit').val(data1[0]['tilesid']);
            $('#sizes-edit').val(data1[0]['sizeid']);

            var sta = data1[0]['status1'];
           
            if(sta == 'Active')
            {
              $('#status1-edit0').prop('checked',true);
             }
             else
             {
               $('#status1-edit1').prop('checked',true);
              }
             

            // Display Modal
           $('#edit-tiles').modal('show'); 
          
  
           
          }
  
  
        }); //ajax ends




     }));// edit-tiles ends;



//edit-pro-modal ajax starts

$('.edit_pro_modal').on('click',(function(e){

  e.preventDefault();

  var id = $(this).attr('data-id');
  $('.add_more').attr('tileid', id);
      $.ajax({
        url: "product-modal-A-edit.php",
        type: 'post',
        data: {
          tiles_id: id

        },
        dataType: 'json',
        success: function (data2, status) {

          $('#E-modelno').val(data2[0]['id2']);
           var sta1 = data2[0]['status1'];

          if (sta1 == 'Active') {
            $('#Emodal-status0').prop('checked', true);

          }
          else {

            $('#Emodal-status1').prop('checked', true);
          }

        }


      });//edit-pro-modal ajax ends

          $.ajax({
            url: "product-modal-A-edit2.php",
            type: 'post',
            data: {
              tiles_id: id

            },
            dataType: 'json',
            success: function (data4, status) {
  //  console.log(data4[0].display);
   
              $.each(data4, function (key, val) {
                if(val.display == 'Enable')
                {
                  var xcheck = 'checked';
 
                }
                else
                {
                  var xcheck = '';
                }

                
                var ImgShow = $("<img src='../../assets/images/modals/" + val.imgg + "' class='img-thumbnail mx-2 showimage"+val.tiles_id+"' width='80'alt='...'>" +
                "<input type='hidden' value='"+ val.tiles_id2 +"' name='tilemodelid'>"+
                  "Show: <input type='checkbox' value='"+ val.tiles_id +"' id='dfds"+val.tiles_id+"' class='checktoshow'"+ xcheck +" name='checktoshow[]'> </br>").on('change', function () {

                    var max_limit = 4; // Max Limit

                    var Clength = $('.checktoshow:checked').length; //length of checkboxes
                   var val_check = $('#limit').text(Clength);

                    if (Clength > max_limit) {
                      this.checked = false;

                    }
                  });// appended value changed and add change event


        var ImgDel = $("<a href='javascript:void(0)' class='Tdel"+val.tiles_id+"' data-md="+ val.tiles_id +"><i class='fa fa-trash' title='Delete'></i></a>");
       
        ImgDel.on('click',(function(){
          var Did =  $(this).attr('data-md');
                $.ajax({
                  url: "del_tiles_modal-A.php",
                  type: "POST",
                  data:{ Did:Did},
                  //dataType: 'json',
                  success: function (datad, status){
                    if(datad == 0){
                      alert('One Item Deleted Successfully');
                     $('.Tdel'+Did).hide();
                     $('.showimage'+Did,).hide();
                     $('#dfds'+Did).fadeOut(1000);
                      
                    }

                  }
                });//ajax ends..
          
          })); //ImgDel ends

               $('#checka').append(ImgDel,ImgShow);// appended the dynamic elements / image show and del


  
              })//each function ends



            } // success ends

          }); //ajax product-modal-A-edit2.php ends


  $('#edit-modal').modal('show');

}));// edit_pro_modal ends



 //on click submit or cancel empty the appended values
 $('#E_model_cancel').on('click', function(){
  $('#checka').empty();

});



$("#E_model_submit").on("click", function(e){
  e.preventDefault();
  if($('.checktoshow').is(':checked')== false ){
   var Val_err = $('#val_check').append("<div class='alert alert-danger'>Pls select atleast one picture</div>");
    setTimeout(function(){Val_err.fadeOut(1000).empty(); }, 2000)
  }
  else
  {

      //var formValues1= $('#form1').serialize();
      $.ajax({
        url: "product-modal-A-edit1.php",
        type: "POST",
        data: $('#form1').serialize(),
        dataType: 'json',
        success: function (data3, status){
          
        if(data3 == 0)
        { 
          $('#edit-modal').modal('toggle'); //close the modal after success
          $('#checka').empty(); // empty the check box after append
         var succ_upd =  $('#update_res').append("<div class='alert alert-primary'>Successfully Updated</div>");
         setTimeout(function(){succ_upd.fadeOut(1000).empty(); }, 2000)
         location.reload();

        }
        else{$('#update_res').append("<div class='alert alert-danger'>Error in Updatation</div>")}
      
    
        }
      });//ajax ends..

  }

}); //emodal submit ends;

//============DELETE===========

$('.del_pro_modal').on('click',(function(e){

  e.preventDefault();


  var delid = $(this).attr('data-id');
  console.log(delid);
      $.ajax({
        url: "del_prod_modal-A.php",
        type: 'post',
        data: {
          delid: delid

        },
        dataType: 'json',
        success: function (data10, status) {

          $.each(data10, function (key, val) {


            
            var ImgShow1 = $("<div class='alert alert-danger del_img"+val.tiles_id+"' role='alert'><img src='../../assets/images/modals/" + val.imgg + "' class='img-thumbnail mx-2 showimage"+val.tiles_id +"' width='80'alt='...'><i class='fa fa-trash showimage1' id='"+val.tiles_id +"'aria-hidden='true'></i></div>" +
            "<input type='hidden' value='"+ val.tiles_id2 +"' name='tilemodelid'>");


            $('#del_imgs').append(ImgShow1);
            
          }); //each function ends


          $('.showimage1').on('click',function(){

            var ImgTrash = $(this).attr('id');
            //console.log(ImgTrash);
            var Imgsrc = $('.showimage'+ImgTrash).attr('src');
            //console.log(Imgsrc);

            $.ajax({
              url: "del_prod_modal-A2.php",
              type: 'post',
              data: {
                delid: ImgTrash,
                imgsrc:Imgsrc
      
              },
              dataType: 'json',
              success: function (data10, status){

                  if(data10 == 0)
                  {
                    $('#success').append("<div class='alert alert-Primary'>Successfully deleted</div>");
                  }
                  else
                  {
                    $('#success').append("<div class='alert alert-danger'>Failed to deleted</div>");
                  }

              }

            });// ajax ends


            var ImgTrashF =  $('.del_img'+ImgTrash);
            ImgTrashF.fadeOut(500);



          }); //showimage1 functions ends

          $('#del_cancel1,#del_cancel2,#del-sub').click(function(){


            $('#delete-modal2').modal('toggle');
            $('#del_imgs').empty();
 
            setTimeout(function() {
              location.reload();
           }, 3000);

          });






        }//success ends
        
      }); //ajax ends.









}));//del_pro_modal ends

//============DELETE ends===========


//============Properties-starts============

$('.edit_prop').on('click',function(){
 var prop_id =  $(this).attr('val');

console.log(prop_id);

      $.ajax({
        url: "properties_edit_A.php",
        type: 'post',
        data: {propert_id : prop_id
      
        },
        dataType: 'json',
        success: function(data11, status)
        {
         // console.log(data11);
         $('#img1').attr('src','../../assets/images/properties/'+data11[0].image);
         $('#img-edit2').val(data11[0].image);
         $('#img-val3').val(data11[0].id);
         $('#title1').val(data11[0].title);
         $('#desc1').text(data11[0].description);
         $('#propt_sub').attr('val-id',data11[0].id);
         var sta1 = data11[0].status1;
           
         if(sta1 == 'Active')
         {
           $('#status1').prop('checked',true);
          }
          else
          {
            $('#status2').prop('checked',true);
           }
        


        }


      });//ajax ends:


});

// propt_sub


  $('.del_prop').on('click', function () {
    console.log('clciked');
    var del_id = $(this).attr('val');
    var del_title = $(this).attr('data-title');
    console.log(del_title);
    $('#del-title').text(del_title);
    $('#del-id').val(del_id);



  });
$('#change_pass').on('click',function(){
 
  $('#cpass-show').show();


});
//modal user close empty

$('#edit-user').on('hidden.bs.modal', function (e) {
  $('#cpass-show').hide();
});

// ============= Edit Users ===========

$('.edit-tbl-user').on('click', function () {


  var edit_id1 = $(this).attr('value');
  console.log(edit_id1);

  $.ajax({
    url: "ceramics/users_A.php",
    type: 'post',
    data: {edit_id1 : edit_id1
  
    },
    dataType: 'json',
    success: function (dusers, status){
      var du = dusers[0];
      console.log(du['user_name']);
      $('#user_name2').val(du['user_name']);
      $('#full_name1').val(du['full_name']);
      $('#contact2').val(du['contact']);
      $('#role1').val(du['role']);
      $('#access1').val(du['cid']);
      $('#user_name1').val(du['status']);
      $('#change_2').val(du['id']);
      if(du['status'] == 'Yes')
      {
        $('#status12').prop('checked', true);
      }
      else{
        $('#status13').prop('checked', true);
      }


    }



  });



});
// ============= Edit Users Ends ===========
// =========================================
// ============= Delete Users ==============

$('.del-tbl-user').on('click', function () {
  
  var del_id1 = $(this).attr('value');
  var del_user = $(this).attr('del_user');

  $('#del_user').text(del_user);
  $('#del_user_t').val(del_id1);






});
// ============= Delete Users Ends ============

$('.add_more').on('click', function () {
  var Am = $(this).attr('tileid');
  $('#E_mod_no').val(Am).attr('readonly', true);
  $('#add-new-modal').modal('show');
  $('#edit-modal').modal('hide');
  

  console.log(Am);
      // $.ajax({
      //   url: "add_more_tiles-A.php",
      //   type: 'post',
      //   data: {tiles_id : Am},
      //   dataType: 'json',
      //   success: function (dusers, status){


      //   }

      // });

  });


});//jquery ends
