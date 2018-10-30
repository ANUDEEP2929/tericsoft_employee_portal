@extends("../layouts/employee_layout");
@section('employee_content')
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
							Document
						</th>
						<th title="Field #2">
							Signed On
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<a href="#">
								<i class="flaticon-file-1"></i>
								Terms_conditions.pdf
							</a>
						</td>
						<td>9/10/2018</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection