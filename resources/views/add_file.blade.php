@extends('layouts.app')
@section('content')
		
<ul class="breadcrumb">
				
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Upload File</h2>	
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
					<div class="box-content"style=" font-size: 18px; font-weight: bold">
						<form class="form-horizontal" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }} 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">File description</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="file_description" required="" >
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
								<label class="control-label" for="selectError3">Session </label>
								<div class="controls">
								  <select id="selectError3" name="session_id">
								  	<option>select Session</option>
								  	<?php

                                	$all_session=DB::table('session')
                                			
                                			
                                            ->get();
                                foreach($all_session as $v_session){?>
									<option value="{{$v_session->session_id}}">{{$v_session->session_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError3">Semester</label>
								<div class="controls">
								  <select id="selectError3" name="semester_id">
								  	<option>select semester</option>
								  	<?php

                                	$all_semester=DB::table('semester')	
                                            		->get();
                                foreach($all_semester as $v_semester){?>
									<option value="{{$v_semester->semester_id}}">{{$v_semester->semester_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Course </label>
								<div class="controls">
								  <select id="selectError3" name="course_id">
								  	<option>select course </option>
								  	<?php

                                	$all_course=DB::table('course')	
                                            		->get();
                                foreach($all_course as $v_course){?>
									<option value="{{$v_course->course_id}}">{{$v_course->course_code}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

								<div class="control-group">
							  <label class="control-label" for="fileInput">Upload file</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="file_any" type="file" required="">
							  </div>
							</div>
          	
							</br>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add File</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
					</div>
					</div>
				
				<!--/span-->

			<!-- </div>/row -->

@endsection