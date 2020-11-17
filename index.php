<?php

	include_once 'config.php';
?>
<!-- ============================================
~~~~~~Required links~~~~~~~~~
https://datatables.net/ 
https://www.w3schools.com/bootstrap/bootstrap_get_started.asp

============================================ -->

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/jquery.dataTables.min.css">
	</head>

	<body>
		<div class='container' style="margin-top:10px">
			<div class="panel panel-primary">
			  <div class="panel-heading">Wordpress Posts
			  	<a class="btn btn-success pull-right" style="margin-top:-7px;"data-toggle="modal" data-target="#createPost">+ Create Posts</a>
			  </div>
			  <div class="panel-body">
			  	<table id="example" class="display" style="width:100%">
			        <thead>
			            <tr>
			                <th>Sr No.</th>
			                <th>Title</th>
			                <th>Description</th>
			                <th>Slug</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody id="table-data">
			            		            
			        </tbody>

			    </table>
			  </div>
			</div>
		</div>


		<!-- ================================
		CREATE POST Modal ================-->

		<div id="createPost" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Create Post</h4>
		      </div>
		      <div class="modal-body">
		         	<form class="form-horizontal" action="javascript:void(0)" id="frmCreateNewWpPost">
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Post Title</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" placeholder="Enter your title" id="title"  name="title">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Description</label>
					    <div class="col-sm-10">
					      <textarea type="text" class="form-control" placeholder="Enter your Description" id="content"  name="content"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
					</form> 
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>


		<!-- ================================
		EDIT POST Modal ================-->

		<div id="postEdit" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit Post</h4>
		      </div>
		      <div class="modal-body">
		         <form class="form-horizontal" action="javascript:void(0)" id="frmEditPost">
		         	<input type="hidden" id="post-id" name="id">
					    <div class="form-group">
						    <label class="control-label col-sm-2" for="title">Post Edit</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" placeholder="Enter post title" id="title_edit"  name="title">
						    </div>
					  	</div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="content">Description</label>
					    <div class="col-sm-10">
					      <textarea type="text" class="form-control" placeholder="Enter your Description" id="content_edit"  name="content"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
					</form> 
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>


		<script>
			var ajaxurl = "<?php echo $site_url; ?>"
		</script>


		<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="./assets/js/rest.js"></script>
	</body>
</html>