$(document).ready(function(){
      $('#button').on('click', function(){
           var input = $('#input').val();
           $('#list').append(`<li class="li" style="border-bottom:solid 1px black;
           	border-bottom-width:1px;
           	width:450px;
           	font-size:40px;
           	list-style:none;
           	color: blue">
           	<input class="check" type = "checkbox"> 
           	${input} 
           	<input class="delete" style = "position: relative;
           	left: 270px; top: -10px;
           	width: 50px; background: #2E8B57; font-weight: bold;
           	border-radius: 2px; color:white" type="submit" value="xóa"></li>`);
  
        $(".check").on("click", function(check){
	    if(check.target.checked){
              $(this).parent().css({'textDecoration':'line-through',
                           'color':'red'
                });
       }
       else{
             $(this).parent().css({'textDecoration':'none',
                           'color':'blue'
                });
            }
        });
        $('.delete').on("click",function(){
            $(this).parent().remove();
        });
    });
});

