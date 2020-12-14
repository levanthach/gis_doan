
$(document).ready(function(){  
    var val_province = "0";
    var val_district = "1";
    var val_commune = "1";
    $('#province option[value='+ val_province +']').attr('selected','selected');
    $('#district option[value='+ val_province +']').attr('selected','selected');
    $('#commune option[value='+ val_province +']').attr('selected','selected');

    $('#province').change(function(){  
         var province_id = $(this).val();  
         $.ajax({  
                url:"../app/controllers/processController.php?action=district",  
                method:"POST",  
                data:{
                    province_id : province_id
                },  
                dataType: 'json',
                success:function(data){  
                    $('#select-district').text('--- Chọn Quận/Huyện ---');
                    var len = data.length;
                    for (var i = 0; i < len; i++){
                        var id = data[i].id;
                        var name = data[i].name;
                        var tr_str = "<option value='" + id + "'>" + name + "</option>";
                        $("#district").append(tr_str);
                    } 
                } 
         });  
    });  

    $('#district').change(function(){  
        var district_id = $(this).val();  
        $.ajax({  
               url:"../app/controllers/processController.php?action=commune",  
               method:"POST",  
               data:{
                district_id : district_id
               },  
               dataType: 'json',
               success:function(data){  
                    $('#select-commune').text('--- Chọn Xã/Phường ---');
                    var len = data.length;
                    for (var i = 0; i < len; i++){
                        var id = data[i].id;
                        var name = data[i].name;
                        var tr_str = "<option value='" + id + "'>" + name + "</option>";
                        $("#commune").append(tr_str);
                    } 
               }  
        });  
   });  
});  