<div id="keyword-div">
<ul class="dropdown-menu keyword-list-ul keywordSearchList keyword-list">
    @foreach($garage_profiles as $g_row)
       <li class="keyword-list-li Address" id="item_list"><a>{{$g_row->name}}</a></li>
    @endforeach
    @foreach($services as $s_row)
       <li class="keyword-list-li Address" id="item_list"><a>{{$s_row->name}}</a></li>
    @endforeach

    @foreach($garage_keywords as $k_row)
       <li class="keyword-list-li Address" id="item_list"><a>{{$k_row->keyword}}</a></li>
    @endforeach

    @foreach($facilities as $f_row)
       <li class="keyword-list-li Address" id="item_list"><a>{{$f_row->name}}</a></li>
    @endforeach

</ul>
</div>
  <script> 
  	$(".keyword-list-li").click(function(){
  		$("#locationList").hide()
        keyword=$(this).text();
        $('#keyword').val(keyword)
        $("#keywordList").hide()
        });
        $("#keyword").click(function(){
        $("#locationList").hide()
    });

    $("#location").click(function(){
        $("#keywordList").hide()
    });
    $('#keyword-div').mouseleave(function() {
        $(this).hide()
    });
    

  </script>
