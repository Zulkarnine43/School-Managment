<!DOCTYPE html>
<html>
<head>
	<title>Registration Fee Slip</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		h2 h3{
			margin: 0;
			padding: 0;
		}
		.table{
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}
		.table th,
		.table td{
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}
		.table thead th{
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}
		.table tbody + tbody{
			border-top: 2px solid #dee2e6;
		}
		.table .table{
			background-color: #fff;
		}
		.table-bordered {
			border: 1px solid #dee2e6;
		}
		.table-bordered th,
		.table-bordered td{
			border: 1px solid #dee2e6;
		}
		.table-bordered thead th,
		.table-bordered thead td{
			border-bottom-width: 2px;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		table tr td{
			padding: 5px;
		}
		.table-bordered thead th,
		.table-bordered td,
		.table-bordered th{
			border: 1px solid black !important;
		}
		.table-bordered thead th{
			background-color: #cacaca;
		}		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{url('public/assets/backend/upload/abc_school.png')}}" style="width: 70px; height: 70px">
						</td>
						<td class="text-center" width="63%">
							<h4><strong>ABC School</strong></h4>
							<h5><strong>Uttar-badda,Dhaka</strong></h5>
						</td>
						<td class="text-center">
							<img src="{{(!empty(@$details->student->image))?url('public/assets/backend/upload/students/'.@$details->student->image):url('public/assets/backend/upload/default.png')}}" style="width: 70px; height: 70px;">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Student Registration Fee Slip</h5>
			</div>
			<div class="col-md-12">
				@php
					$registrationFee = App\Model\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();
					$originalFee = $registrationFee->amount;
					$discount = $details->discount->discount;
					$discountFee = $discount/100*$originalFee;
					$finalFee = (float)$originalFee-(float)$discountFee;
				@endphp
				<table border="1" width="100%">
					<tbody>
						<tr>
							<td style="width: 50%">ID No</td>
							<td>{{ $details->student->id_no }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Roll Number</td>
							<td>{{ $details->roll }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Student Name</td>
							<td>{{ $details->student->name }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Father's Name</td>
							<td>{{ $details->student->fname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Mother's Name</td>
							<td>{{ $details->student->mname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Year</td>
							<td>{{ $details->year->name }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Class</td>
							<td>{{ $details->student_class->name }}</td>
						</tr>						
						<tr>
							<td style="width: 50%">Registration Fee</td>
							<td>{{ $originalFee }} Tk</td>
						</tr>
						<tr>
							<td style="width: 50%">Discount Fee</td>
							<td>{{ $discount }}%</td>
						</tr>
						<tr>
							<td style="width: 50%">Fee (This Student)</td>
							<td>{{ $finalFee }} Tk</td>
						</tr>						
					</tbody>
				</table><br>
				<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
			</div>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 30%"></td>
							<td style="width: 40%; text-align: center;">
								<hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
								<p style="text-align: center;">Principal/Head Master</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>		
		<hr style="border: dashed 1px; width: 96%; color: #DDD; margin-bottom: 50px;">
		<div class="row">
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{url('public/assets/backend/upload/abc_school.png')}}" style="width: 70px; height: 70px">
						</td>
						<td class="text-center" width="63%">
							<h4><strong>ABC School</strong></h4>
							<h5><strong>Uttar-badda,Dhaka</strong></h5>
						</td>
						<td class="text-center">
							<img src="{{(!empty(@$details->student->image))?url('public/assets/backend/upload/students/'.@$details->student->image):url('public/assets/backend/upload/default.png')}}" style="width: 70px; height: 70px;">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Student Registration Fee Slip</h5>
			</div>
			<div class="col-md-12">
				@php
					$registrationFee = App\Model\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();
					$originalFee = $registrationFee->amount;
					$discount = $details->discount->discount;
					$discountFee = $discount/100*$originalFee;
					$finalFee = (float)$originalFee-(float)$discountFee;
				@endphp
				<table border="1" width="100%">
					<tbody>
						<tr>
							<td style="width: 50%">ID No</td>
							<td>{{ $details->student->id_no }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Roll Number</td>
							<td>{{ $details->roll }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Student Name</td>
							<td>{{ $details->student->name }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Father's Name</td>
							<td>{{ $details->student->fname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Mother's Name</td>
							<td>{{ $details->student->mname }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Year</td>
							<td>{{ $details->year->name }}</td>
						</tr>
						<tr>
							<td style="width: 50%">Class</td>
							<td>{{ $details->student_class->name }}</td>
						</tr>						
						<tr>
							<td style="width: 50%">Registration Fee</td>
							<td>{{ $originalFee }} Tk</td>
						</tr>
						<tr>
							<td style="width: 50%">Discount Fee</td>
							<td>{{ $discount }}%</td>
						</tr>
						<tr>
							<td style="width: 50%">Fee (This Student)</td>
							<td>{{ $finalFee }} Tk</td>
						</tr>						
					</tbody>
				</table><br>
				<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
			</div>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 30%"></td>
							<td style="width: 40%; text-align: center;">
								<hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
								<p style="text-align: center;">Principal/Head Master</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
</body>
</html>