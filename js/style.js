$(document).ready(function(){
    $("#signup").click(function(){
      $(".register").show(500);
      
      })
      $(".close_btn1").click(function(){
        $(".register").hide(500);
    })
  })  
  $(document).ready(function(){
    $("#signin").click(function(){
      $(".login").show(500);
      
      })
      $(".close_btn2").click(function(){
        $(".login").hide(500);
    })
  })  
  $(document).ready(function(){
    $("#search").click(function(){
      $(".search").show(500);
      
      })
      $(".close_btn3").click(function(){
        $(".search").hide(500);
    })
  })  
  $(document).ready(function(){
    $("#book").click(function(){
      $(".pcr").show(500);
      
      })
      $(".close_btn4").click(function(){
        $(".pcr").hide(500);
    })
  })  
  //live search
  function showResult(str) {
    if (str.length==0) { 
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #0099da";
      }
    }
    xmlhttp.open("GET","get_livesearch_data.php?q="+str,true);
    xmlhttp.send();
  }
  //form validation
  
 