<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simple Restaurant POS</title>	
	<script type="text/javascript" charset="utf-8" src="<?= base_url(); ?>assets/js/jquery.js"> </script>
	<script type="text/javascript" charset="utf-8" src="<?= base_url(); ?>assets/js/bootstrap.js"> </script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css"  type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome/font-awesome.css"  type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/layout.css"  type="text/css" />
</head>
<body>
	<div class="navbar navbar-default">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Annie's Grill </a>
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	    <? if($userInfo['logged_in']) :?>
	      <li><a href='<?= site_url();?>'><span class="glyphicon glyphicon-home"></span> Home</a>
	      <? if($userInfo['usertype'] == "admin") :?>
	      <li><a href='<?= site_url();?>items' ><span class="glyphicon glyphicon-eye-open"></span> Items</a></li>
	      <li><a href='<?= site_url();?>receipts/today'  ><span class="glyphicon glyphicon-calendar"></span> Today</a></li>
	      <li><a href='<?= site_url();?>users'  ><span class="glyphicon glyphicon-user"></span> Users/ Employee</a></li>
	    <? endif ;?>
	      <li><a href='<?= site_url();?>work_track/time_track' class="work_time"  ><span class="glyphicon glyphicon-time"></span> Time In</a></li>
	    </ul>
	   <? endif ;?>
	    <? if($userInfo['logged_in']) :?>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href='<?= site_url();?>auth/logout' class="danger" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	    </ul>
	   <? endif ;?>
	  </div>
	</div>

   <div class="container">
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center" id="myModalLabel">Confirm Authorization</h4>
	      </div>
	      <div class="modal-body">
	      <div class="modal-body-content1">
	      </div>
	      <div class="modal-body-content2">
	      </div>
	      <form action="<?= base_url(); ?>authorization/check" method="post" id="modal-form" /> 
		<p>
			<input type="text" name="username" placeholder="Username/ ID" />
			<input type="hidden" name="current_url" id="current_url" value="<?= current_url(); ?>"  />
			<input type="hidden" name="proccess_url" id="proccess_url"  />
		</p>
		<input type="submit" value="Submit" class="btn btn-success" />
		</form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end Modal -->


	<!-- Modal -->
	<div class="modal fade" id="myTime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center" id="myModalLabel">Time In/ Time Out/ Break in/ Break Out</h4>
	      </div>
	      <div class="modal-body">
	      <div class="modal-body-content1">
	      </div>
	      <div class="modal-body-content2">
	      </div>
	      <form action="<?= base_url(); ?>work_time/time_track" method="post" id="modal-form" /> 
		<p>
			<input type="password" name="username" placeholder="Username/ ID" />
			<input type="hidden" name="current_url" id="current_url" value="<?= current_url(); ?>"  />
			<input type="hidden" name="proccess_url" id="proccess_url"  />
		</p>
		<p>
			<select name="category" class='form-control'>
			  <option value="time_in">Time In</option>
			  <option value="time_out">Time Out</option>
			  <option value="break_in">Break In</option>
			  <option value="break_out">Break Out</option>	
			</select>
		</p>
		<input type="submit" value="Submit" class="btn btn-success" />
		</form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end Modal -->
	<?= $yield ?>
   </div>

<script type="text/javascript" charset="utf-8">
 $(document).ready(function(){
  $('input[type=text]').addClass('form-control');
  $('input[type=hidden]').removeClass('form-control');
  $('input[type=password]').addClass('form-control');
  $('input[type=submit]').addClass('btn btn-success btn-block btn-lg');

	$('.authorize').click(function(e){
	  e.preventDefault();
	  $('#myModal').modal('show');
	  $('#myModal #proccess_url').val($(this).attr('href'));
	});

	$('.work_time').click(function(e){
	  e.preventDefault();
	  $('#myTime').modal('show');
	  $('#myTime #proccess_url').val($(this).attr('href'));
	});

	$('#modal-form').submit(function(){
	  $('#myModal').modal('hide');
	});
 });
</script>
</body>
</html>
