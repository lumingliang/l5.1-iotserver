@extends('iot.layout')
@section('admin-content')

<div class="am-g">
	<div class="am-u-lg-10">
	<div id="history_data" class="charts-width"></div>
	</div>
</div>

  <div class="am-g">
<div class="am-u-lg-10">

  <div class="am-panel am-panel-default">
  <div class="am-panel-hd am-text-center">
  <span class="am-icon-heart am-text-secondary  am-text-xl">历史数据</span>
  </div>
  <table class="am-table am-table-bd am-table-bdrs am-table-striped am-table-hover">
              <tbody >
              <tr >
                <th>值</th>
                <th>时间</th>
              </tr>
			  @foreach( $datas as $data )
			  <tr>
				<th>{{$data->value}}</th>
				<th>{{$data->created_at}}</th>
			  </tr>
			  @endforeach

              </tbody>
  </table>
  </div>
</div>
</div>
@endsection

@section('js')
<script>
	var d = $('meta[name="iot-data"]').attr('content'); 
	var iot_data =eval("("+ d+")");
	console.log( iot_data );
    var c = document.getElementById('history_data'); 
	var chart = echarts.init(c);


  var option = {
    title: {
        text: 'CO2实时状况'
    },
    tooltip: {
        trigger: 'axis'
    },
    toolbox: {
        show: true,
        feature: {
            saveAsImage: {show: true}
        }
    },
    xAxis: {
       type: 'category',
        boundaryGap: false,
        data: []
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        name: '',
        type: 'line',
        smooth: true,
        data: []
    }]
};

for( var key in iot_data ) {
	option.series[0].data.push(iot_data[key].value);
	var date = iot_data[key].created_at.split(' ')[1];
	option.xAxis.data.push(date);
}

chart.setOption(option);
</script>
@endsection
