@extends("../layouts/employee_layout");
<style type="text/css">
tbody a:hover{
	text-decoration: none;
}
</style>
@section('employee_content')
<?php $sno=1; ?>
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
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="Field #1">
							Sno
						</th>
						<th title="Field #2">
							Message
						</th>
						<th title="Field #3">
							Date
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($notifications as $notification){ ?>
					<tr>
						<td>
							{{$sno}}
						</td>
						<td>
							{{$notification->message}}
						</td>
						<td>
							{{$notification->created_at}}
						</td>
					</tr>
					<?php $sno++ ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
@endsection