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
              //không chọn $('.check') vì nếu sử dụng $('.check')
              //thì khi click vào checkbox nó sẽ dựa trên $('.check')
              //nó sẽ hiểu là những checkbox nào có class ="check" thì
              //nó sẽ chọn tất cả các checkbox đó  
              //sẽ dẫn tới tình trạng nó sẽ đổi màu tất cả các cái
              //thẻ li cha của nó
              //nếu thay thì nó sẽ chỉ hiểu là đây là checkbox hiện tại
              //nên sẽ chỉ có một ô được chọn
              //khi sử dụng this cho checkbox thì khi kết hợp với parent() 
              //thì nó sẽ trỏ vào tập cha của nó tức là li chứa nó 
              //và thực hiện đổi màu
              console.log($(this).parent());
       }
       else{
             $(this).parent().css({'textDecoration':'none',
                           'color':'blue'
                });
              console.log($(this).parent());
            }
        });
        $('.delete').on("click",function(){
            $(this).parent().remove();
        });
    });
});

