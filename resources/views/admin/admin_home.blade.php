@extends("../layouts/admin_layout");

@section('admin_content')
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body">
					<div class="col-md-4">
						<div class="m-input-icon m-input-icon--left">
							<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
							<span class="m-input-icon__icon m-input-icon__icon--left">
								<span>
									<i class="la la-search"></i>
								</span>
							</span>
						</div>
					</div>
					<br>
					<div class="col-md-8">
						<div class="m-input-icon m-input-icon--left">
							<a href="#" class="btn btn-primary"  data-toggle='modal' data-target='#add_employee'>
								Add New Employee
							</a>
						</div>
					</div>
					<br>
					<?php 
						$i=0;
					 ?>
					<table class="m-datatable" id="html_table" width="100%">
						<thead>
							<tr>
								<th title="Field #1">
									Employee ID
								</th>
								<th title="Field #1">
									Employee Name
								</th>
								<th title="Field #4">
									Employee Role
								</th>
								<th title="Field #5">
									Employee Joined On
								</th>
								<th title="Field #6">
									status
								</th>
								<th title="Field #7">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user){
								echo "<tr>
									<td>$user->id</td>
									<td>$user->name</td>
									<td>$user->role</td>
									<td>$user->created_at</td>
									<td>";
									if($user->status){
										echo "<span class='m-badge m-badge--success m-badge--wide'>
												Active
											</span>";
										}
										else{
											echo "<span class='m-badge m-badge--danger m-badge--wide'>
												In-Active
											</span>";
										}
										echo"</td>
									<td style='z-index: 100'>
										<i class='la la-edit' style='cursor: pointer;' data-toggle='modal' data-target='#m_modal_$i'></i>
									</td>
								</tr>";
								$i++;
								}
								$i=0;
							?>
						</tbody>
					</table>
					<?php 
					foreach ($users as $user){
						?>
						<div class='modal fade' id='m_modal_{{$i}}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							<div class='modal-dialog modal-lg' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='exampleModalLabel'>
											Edit User
										</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>
												&times;
											</span>
										</button>
									</div>
									<div class='modal-body'>
										<form method='post' action='admin/updateEmployee' autocomplete="off">
											<label style='display:none'>{{ csrf_field() }}</label>
											<input type='text' style='display:none' name='id' value= '{{$user->id}}' class='form-control' id='recipient-name'>
												<div class='form-group'>
													<label for='recipient-name' class='form-control-label'>
														Name:
													</label>
													<input type='text' name='name' value= '{{$user->name}}' class='form-control' id='recipient-name'>
												</div>
												<div class='form-group'>
													<label for='message-text' class='form-control-label'>
														Email:
													</label>
													<input type='text' name='email' value= '{{$user->email}}' class='form-control' id='recipient-name'>
												</div>
												<div class='form-group'>
													<label for='message-text' class='form-control-label'>
														Status:
													</label>
													<div class='col-3'>
														<span class='m-switch m-switch--icon'>
															<label>
															<?php
															if($user->status){
																echo "<input type='checkbox' checked='checked' name='role'>";
															}
															else{
																echo "<input type='checkbox' name='role'>";
															}
															?>
															<span></span>
															</label>
														</span>
													</div>
												</div>
												<div class='modal-footer'>
													<button type='submit' class='btn btn-primary'>
														Update
													</button>
												</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
					<?php $i++;
					}
				?>
			</div>
		</div>
		<div class='modal fade' id='add_employee' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							<div class='modal-dialog modal-lg' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='exampleModalLabel'>
											New message
										</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>
												&times;
											</span>
										</button>
									</div>
									<div class='modal-body'>
										<form method='post' action="admin/addEmployee" autocomplete="off">
											<label style='display:none'>{{ csrf_field() }}</label>
											<div class='form-group'>
												<label for='recipient-name' class='form-control-label'>
													Employee name:
												</label>
												<input type='text' name='name' class='form-control' id='recipient-name'>
											</div>
											<div class='form-group'>
												<label for='message-text' class='form-control-label'>
													email:
												</label>
												<input type='text' name='email' class='form-control' id='recipient-name'>
											</div>
											<div class='form-group'>
												<label for='message-text' class='form-control-label'>
													role:
												</label>
												<select class='form-control m-input m-input--square' name='role' id='exampleSelect1'>
												<option value='admin'>
													Admin
												</option>
												<option value='employee'>
													Employee
												</option>
											</select>
											</div>
											<div class='form-group'>
												<label for='message-text' class='form-control-label'>
													password:
												</label>
												<input type='password' name='password' class='form-control' id='recipient-name'>
											</div>
											<div class='modal-footer'>
												<button type='submit' class='btn btn-primary'>
													Add
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection