<ul class="dropdown-menu keyword-list-ul" style="margin-top: 38px;display:block;width:100%;width: 260px;max-height:400px;overflow:scroll;overflow-x:hidden;">
      @foreach($locations as $l_row)
       <li class="keyword-list-li" id="item_list"><a>{{$l_row->address}}</a></li><hr style="margin:5px;">
       @endforeach


  </ul>

  <script>
  	$(".keyword-list-li").click(function(){
  keyword=$(this).text();
  $('#location').val(keyword)
  $("#locationList").hide()
});

$("#keyword").click(function(){
$("#locationList").hide()
});

$("#location").click(function(){
$("#keywordList").hide()
});
$('#locationList').mouseleave(function() {
        $(this).hide()
    });
  </script>
