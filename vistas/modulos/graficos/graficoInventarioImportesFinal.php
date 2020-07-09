<div class="card border-success mb-4" >
	<div class="card-header" style="background: green;color:white">Inventario Final</div>
	<div class="card-body text-success">
		<figure class="highcharts-figure">
			<div id="inventarioFinalImportes"></div>

		</figure>
	</div>
</div>
<script type="text/javascript">
// Create the chart
Highcharts.chart('inventarioFinalImportes', {
    chart: {
        type: 'column'
    },
    title: {
          text: 'Inventario Por Sucursales'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Unidades'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
    },

   series: [
        {
            name: "Sucursales",
            colorByPoint: true,
            data: [
                {
                    name: "San Manuel",
                    y: <?php echo rand(1,1000)?>,
                    drilldown: "San Manuel"
                },
                {
                    name: "Reforma",
                    y: <?php echo rand(1,1000)?>,
                    drilldown: "Reforma"
                },
                {
                    name: "Capu",
                    y:<?php echo rand(1,1000)?>,
                    drilldown: "Capu"
                },
                {
                    name: "Santiago",
                    y:<?php echo rand(1,1000)?>,
                    drilldown: "Santiago"
                },
                {
                    name: "Las Torres",
                    y:<?php echo rand(1,1000)?>,
                    drilldown: "Las Torres"
                }
            ]
        }
    ]
   
});
</script>
<style type="text/css" media="screen">
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#inventarioFinalImportes {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


</style>