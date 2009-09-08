<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
	<title>Twistori Word Manage</title>
	<base href="<?=base_url()?>"/>
	<link href="public/css/ui-lightness/sortable.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="public/css/farbtastic.css" type="text/css" />
	<script type="text/javascript" src="public/javascript/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="public/javascript/jquery-sortable.js"></script>
	<script type="text/javascript" src="public/javascript/jquery.form.js"></script>
	<script type="text/javascript" src="public/javascript/farbtastic.js"></script>
	<script type="text/javascript">
	$(function(){
		
		$("#sortable").sortable({
			update:function(){
				$("#sequence_ids").val($("#sortable").sortable( 'toArray' ));
			}
		});
		$("#sortable").disableSelection();

		 $('#orderform').ajaxForm(function(data){
			alert(data);
		 }); 
		  $('#colorpicker').farbtastic('#color');
	});
	</script>
</head>
<body>
<?php include('menu.php'); ?>