
$(document).ready(function(){  
    var val_province = "1";
    var val_district = "1";
    var val_commune = "1";
    $('#province option[value='+ val_province +']').attr('selected','selected');
    $('#district option[value='+ val_province +']').attr('selected','selected');
    $('#commune option[value='+ val_province +']').attr('selected','selected');

    $('#province').change(function(){  
         var province_id = $(this).val();  
         $.ajax({  
                url:"../app/controllers/homeController.php",  
                method:"POST",  
                data:{
                    province_id:province_id
                },  
                success:function(data){  
                    $('#district').html(data);  
                }  
         });  
    });  
});  