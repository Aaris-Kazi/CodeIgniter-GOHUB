<head>
	<link rel = "icon" href =  "<?php echo base_url('templates/logo.png');?>" type = "image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>templates/mystyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
	<script>
	$(document).ready(function()
	{
		$("#toggle").click(function()
		{
			$("#user_box").toggle(1000);
		})
	})
	</script>

<script>
$(document).ready(function(){
 $('#gsearchsimple').keyup(function(){
  var query = $('#gsearchsimple').val();
  $('#detail').html('');
  $('.list-group').css('display', 'block');
  if(query.length == 2)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    success:function(data)
    {
     $('.list-group').html(data);
    }
   })
  }
  if(query.length == 0)
  {
   $('.list-group').css('display', 'none');
  }
 });

 $('#localSearchSimple').jsLocalSearch({
  action:"Show",
  html_search:true,
  mark_text:"marktext"
 });

 $(document).on('click', '.gsearch', function(){
  var place = $(this).text();
  $('#gsearchsimple').val(place);
  $('.list-group').css('display', 'none');
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{place:place},
   success:function(data)
   {
    $('#detail').html(data);
   }
  })
 });
});
</script>
<script>
    $(document).ready(function(){
  $("#trip-list").mouseover(function(){
    $("#trip-list").css("background-color", "yellow");
  });
  $("#trip-list").mouseout(function(){
    $("#trip-list").css("background-color", "white");
  });
});
</script>



</head>