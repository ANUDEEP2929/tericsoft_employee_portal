@extends("../layouts/admin_layout");
<style>
#paint {border: 1px solid black; background : #333333; margin-left: auto; margin-right: auto; display: block;}
</style>
@section('admin_content')
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<embed src="{{asset("storage/app/$document_url->document_url")}}" width="100%" height="500px" />
			<hr>
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="Field #1">
							user_name
						</th>
						<th title="Field #2">
							Email
						</th>
						<th title="Field #3">
							Signed On
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($signed_users as $user){
					?>
					<tr>
						<td>
							{{$user->name}}
						</td>
						<td>{{$user->email}}</td>
						<td>9/10/2018</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
@endsection
