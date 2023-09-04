$(document).ready(function(){
    $("#add").click(function(){
      $("#display").show(500);
      
      })
      $("#close_btn").click(function(){
        $("#display").hide(500);
    })
  })  
  $(document).ready(function(){
    $("#add").click(function(){
      $.ajax({
        url:"Doctor_Details.php",
        type:"post",
        data:"$('#frm').serialize()",
        success:function(d)
        {
          alert(d);
          $("#frm")[0].reset();
        }

      })
    })
  })
  $(document).ready(function(){
    $("#bot").click(function(){
      $(".doctor_add").show(500);
      
      })
      $("#close_btn").click(function(){
        $(".doctor_add").hide(500);
    })
  })