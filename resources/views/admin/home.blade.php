@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($orders->count(),2)}}</strong></h5>
                <span>Total Order</span>
              </div>
          </div>
        </div>
        
        
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($orders->where('status','Pending')->count(),2)}}</strong></h5>
                <span>Total Pending Order</span>
              </div>
          </div>
        </div>
        
       
        
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($orders->where('status','processing')->count(),2)}}</strong></h5>
                <span>Total Proseccing</span>
              </div>
          </div>
        </div>
        
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($orders->where('status','complete')->count(),2)}}</strong></h5>
                <span>Total Complete Order</span>
              </div>
          </div>
        </div>
        
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($users,2)}}</strong></h5>
                <span>Total Customer</span>
              </div>
          </div>
        </div>
        <br>
        <div class="col-md-3 widget widget1" style="margin-top:10px;">
          <div class="r3_counter_box">
              <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
              <div class="stats">
                <h5><strong>{{ number_format($visitor->total_count,0)}}</strong></h5>
                <span>Total Visitors</span>
              </div>
          </div>
        </div>
    
        <div class="clearfix"> </div>
        <div class="col-md-12">
            <br><div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    
    </div>
</div>

@endsection


@push('js')

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
    dataPointWidth: 30,
	animationEnabled: true,
	title:{
		text: "Order Amount Chart"   
	},
	axisY:{
		title:"Monthly Order Amount"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [{
		type: "stackedColumn",
		name: "Total Amount",
		showInLegend: "false",
		yValueFormatString: "",
		dataPoints: [
			<?php 
			
           		foreach ($monthly_order as  $value) {
           		    $date=date("M", strtotime($value->new_date));
           		    $amount=$value->data;
           		    
           			echo "{ y:{$amount}, label: '{$date}'},\r\n";
           		}
           	?>
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>

@endpush
