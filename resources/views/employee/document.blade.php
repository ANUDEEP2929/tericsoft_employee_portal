@extends("../layouts/employee_layout");
<style>
.wrapper {
  position: relative;
  width: 400px;
  height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border:1px solid black;
}
.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width:400px;
  height:200px;
}
</style>
@section('employee_content')
	<div class="m-portlet m-portlet--mobile">
	<form action="/employee/saveSignature" method="post">
		<label style='display:none'>{{ csrf_field() }}</label>
		<div class="m-portlet__body">
			<embed src="{{asset("$document->document_url")}}" width="100%" height="500px" />
			<hr>
			<input type="text" name="doc_id" style="display: none" value="{{$document->id}}"/>
			<div class="m-radio-inline">
				<?php if($documentuser->is_accepted){ ?>
					<label class="m-radio">
						<input type="radio" name="is_accept" value="1" checked disabled>
						Accept
						<span></span>
					</label>
					<label class="m-radio">
						<input type="radio" name="is_accept" value="0" disabled>
						Reject
						<span></span>
					</label>
				<?php } 
				else {?>
					<label class="m-radio">
						<input type="radio" name="is_accept" value="1">
						Accept
						<span></span>
					</label>
					<label class="m-radio">
						<input type="radio" name="is_accept" value="0">
						Reject
						<span></span>
					</label>
				<?php } ?>
					<br>
						<?php if(!$documentuser->is_signed){ ?>
							<input type="text" name="imgurl" id="imgurl" value="" style="display: none"><img id="img" src=""/>
						<?php } else { ?>
							<input type="text" name="imgurl" id="imgurl" value="" style="display: none"><img id="img" src="{{$imgurl}}"/>
						<?php } ?>
			</div>
			<br>
	<?php if(!$documentuser->is_signed){ ?>
			<div class="col-md-8">
				<div class="m-input-icon m-input-icon--left">
					<button class="btn btn-primary" type="submit">
						Submit
					</button>
				</div>
			</div>
	<?php } ?>
		</div>
	</form>
	<?php if(!$documentuser->is_signed){ ?>
		<span>
			<h4>
			  Signature Here
			</h4>
			<div class="wrapper">
			  <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
			</div>
			<div>
			  <button id="save">Save</button>
			  <button id="clear">Clear</button>	
			</div>			
		</span>
	<?php } ?>		
	</span>
</div>
<script type="text/javascript">
	var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
	  backgroundColor: 'rgba(255, 255, 255, 0)',
	  penColor: 'rgb(0, 0, 0)'
	});

	function download(dataURL, filename) {
	  if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
	    window.open(dataURL);
	  } else {
	    var blob = dataURLToBlob(dataURL);
	    console.log(blob);
	    var url = window.URL.createObjectURL(blob);
	    console.log(url);
	    var a = document.createElement("a");
	    a.style = "display: none";
	    a.href = url;
	    a.download = filename;

	    document.body.appendChild(a);
	    a.click();

	    window.URL.revokeObjectURL(url);
	  }
	}

	function dataURLToBlob(dataURL) {
	  // Code taken from https://github.com/ebidel/filer.js
	  var parts = dataURL.split(';base64,');
	  var contentType = parts[0].split(":")[1];
	  var raw = window.atob(parts[1]);
	  var rawLength = raw.length;
	  var uInt8Array = new Uint8Array(rawLength);

	  for (var i = 0; i < rawLength; ++i) {
	    uInt8Array[i] = raw.charCodeAt(i);
	  }

	  return new Blob([uInt8Array], { type: contentType });
	}

	var saveButton = document.getElementById('save');
	var cancelButton = document.getElementById('clear');

	saveButton.addEventListener('click', function (event) {
		if (signaturePad.isEmpty()) {
		    alert("Please provide a signature first.");
		  } else {
		    var dataURL = signaturePad.toDataURL();
		    document.getElementById('img').src=dataURL;
		    document.getElementById('imgurl').value=dataURL;

		    // download(dataURL, "signature.png");
		  }
	});

	cancelButton.addEventListener('click', function (event) {
	  signaturePad.clear();
	});
</script>
@endsection
