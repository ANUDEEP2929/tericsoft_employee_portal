@extends("../layouts/admin_layout");
<style>
tbody a:hover{
	text-decoration: none;
}
</style>
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
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="Field #1">
							Name
						</th>
						<th title="Field #2">
							Email
						</th>
						<th title="Field #3">
							PhoneNo
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<a href="#">
								Anudeep Reddy
							</a>
						</td>
						<td>Anudeep@tericsoft.com</td>
						<td>9032135654</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection