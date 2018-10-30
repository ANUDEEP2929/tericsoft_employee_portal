@extends("../layouts/employee_layout");
<style>
#paint {border: 1px solid black; background : #333333; margin-left: auto; margin-right: auto; display: block;}
</style>
@section('employee_content')
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<embed src="documents/test.pdf" width="100%" height="500px" />
			<hr>
			<div class="m-radio-inline">
				<label class="m-radio">
					<input type="radio" name="example_3" value="1">
					Accept
					<span></span>
				</label>
				<label class="m-radio">
					<input type="radio" name="example_3" value="2">
					Reject
					<span></span>
				</label>
				<span>
					<div id="sketch">
					  <canvas id="paint"></canvas>
					</div>
				</span>
			</div>
		</div>
	</div>
	<script type="text/javascript">

	var canvas = document.getElementById('#paint');
	var ctx = canvas.getContext("2d");
	 
	var sketch = document.getElementById('sketch');
	var sketch_style = getComputedStyle(sketch);
	canvas.width = 500;
	canvas.height = 250;

	var mouse = {x: 0, y: 0};
	 
	/* Mouse Capturing Work */
	canvas.addEventListener('mousemove', function(e) {
	  mouse.x = e.pageX - this.offsetLeft;
	  mouse.y = e.pageY - this.offsetTop;
	}, false);

	/* Drawing on Paint App */
	ctx.lineJoin = 'round';
	ctx.lineCap = 'round';

	ctx.strokeStyle = "red";
	function getColor(colour){ctx.strokeStyle = colour;}

	function getSize(size){ctx.lineWidth = size;}


	//ctx.strokeStyle = 
	//ctx.strokeStyle = document.settings.colour[1].value;
	 
	canvas.addEventListener('mousedown', function(e) {
	    ctx.beginPath();
	    ctx.moveTo(mouse.x, mouse.y);
	 
	    canvas.addEventListener('mousemove', onPaint, false);
	}, false);
	 
	canvas.addEventListener('mouseup', function() {
	    canvas.removeEventListener('mousemove', onPaint, false);
	}, false);
	 
	var onPaint = function() {
	    ctx.lineTo(mouse.x, mouse.y);
	    ctx.stroke();
	};
</script>
@endsection
