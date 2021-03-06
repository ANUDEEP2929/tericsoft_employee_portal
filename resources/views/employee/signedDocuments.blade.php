@extends("../layouts/employee_layout");
<style>
tbody a:hover{
	text-decoration: none;
}
</style>
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
							File
						</th>
						<th title="Field #2">
							View File
						</th>
						<th title="Field #3">
							Signed on
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($documents as $document){ ?>
					<tr>
						<td>
							<a href="/employee/document/{{$document->id}}">
								<i class="flaticon-file-1"></i>
								{{$document->document_name}}
							</a>
						</td>
						<td><a href="/employee/document/{{$document->id}}"><i class="flaticon-eye"></i></a></td>
						<td>{{$document->docusers->signed_on}}</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
@endsection