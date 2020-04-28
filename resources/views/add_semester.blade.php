@extends('layouts.app')
@section('content')


<ul class="breadcrumb">
						
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Semester</h2>	
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
						<form class="form-horizontal" action="/save-semester" method="post">
						{{ csrf_field() }} 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Semester Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="semester_name" required="" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Department name</label>
								<div class="controls">
								  <select id="selectError3" name="department_id">
								  	<option>select department</option>
								  	<?php

                                	$all_department=DB::table('dept')
                                                        ->get();
                                    
                                foreach($all_department as $v_department){?>
									<option value="{{$v_department->department_id}}">{{$v_department->department_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Session name</label>
								<div class="controls">
								  <select id="selectError3" name="session_id">
								  	<option>select session</option>
								  	<?php

                                	$all_semester=DB::table('session')
                                			
                                			
                                            ->get();
                                foreach($all_semester as $v_semester){?>
									<option value="{{$v_semester->session_id}}">{{$v_semester->session_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							  </br>


          
							

							



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add course</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection