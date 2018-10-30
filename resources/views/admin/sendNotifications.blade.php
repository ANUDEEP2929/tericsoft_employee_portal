@extends("../layouts/admin_layout");

@section('admin_content')
<form method="post" action="admin/sendNotification" enctype="multipart/form-data">
	<label style='display:none'>{{ csrf_field() }}</label>
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<textarea name="message" class="form-control m-input m-input--solid" id="exampleTextarea" rows="3" placeholder="Enter Your Notice"></textarea>
				<br>
			<div class="col-md-8">
				<div class="m-input-icon m-input-icon--left">
					<button class="btn btn-primary" type="submit">
						Send Now
					</button>
				</div>
			</div>
			<hr>
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
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th  class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand"><input type="checkbox"><span></span></label></span></th>
						<th title="Field #1">
							Employee ID
						</th>
						<th title="Field #2">
							Employee Email
						</th>
						<th title="Field #3">
							role
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($users as $user){
					?>
					<tr>
						<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox"  name="employee_ids[]" value="{{$user->id}}"><span></span></label></span></td>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->role}}</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</form>

<?php if(isset($message)){?>
		<script type="text/javascript">
			window.onload=function(){
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};
			toastr.error('{{$message}}');
					}
		</script>
	<?php } ?>
@endsection