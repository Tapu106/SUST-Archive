@extends('layouts.app')

@section('content')

<ul class="breadcrumb">
				
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Department</h2>	
					</div>
					<p class="alert-success" >
						 <?php
						$message=Session::get('message');
					
						if ($message) {
							echo $message;
							Session::put('message',NULL);
						}

						?>

					</p>
					<div class="box-content">
						<form class="form-horizontal" action="/save-dept" method="post">
						{{ csrf_field() }} 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Department Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="department_name" required="" >
							  </div>
							</div>
					</br>
          
							

							



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Department</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection