<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
    	Content Manager
        <small>Store Hours</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Content Manager</li>
        <li class="active">Store Hours</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">  
	<div class="row">
       	<div class="col-xs-12">
       		<div class="box">
           		<div class="box-header">
		         	<h3 class="box-title">Regular Hours</h3>
		        </div>
            	<!-- /.box-header -->
	            <div class="box-body">
	            	<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	              		<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
			                <thead>
			                	<tr role="row">
			                		<th>Weekday</th>
			                		<th>Opening Hour</th>
			                		<th>Closing Hour</th>
			                		<th>Actions</th>
		                		</tr>
			                </thead>
		                	<tbody>
		                		<?php foreach($hours as $hour) :?>
			                	<tr role="row">
			                  		<td><?php echo $hour['StoreHour']['day']; ?></td>
					                <td>
					                	<div class="form-group">
											<div class="input-group">
                    							<input type="text" class="form-control timepicker" value="<?php echo $hour['StoreHour']['open']; ?>">
												<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                  							</div>
                  							<!-- /.input group -->
                						</div>
                							
                					</td>
					                <td><?php echo $hour['StoreHour']['close']; ?></td>
					                <td><a class="btn btn-default" href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
				                </tr>
				                <?php endforeach; ?>
			                </tbody>
	                	</table>
	            	</div>
            	</div>
	            <!-- /.box-body -->
	        	</div>
        	</div>
   	</div>
</section>