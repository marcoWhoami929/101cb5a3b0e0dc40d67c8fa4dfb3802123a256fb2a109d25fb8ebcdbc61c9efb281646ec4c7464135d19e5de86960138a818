<div class="card border-success mb-4" >
    <div class="card-header" style="background: green;color:white">Necesidad de Inventario</div>
    <div class="card-body text-success">
        <figure class="highcharts-figure">
            <div id="necesidadInventarioUnidades"></div>

        </figure>
    </div>
</div>
<script type="text/javascript">
    Highcharts.chart('necesidadInventarioUnidades', {

    chart: {
        styledMode: true
    },

    title: {
        text: 'Productos Con Necesidad'
    },

    series: [{
        type: 'pie',
        allowPointSelect: false,
        keys: ['name', 'y', 'selected', 'sliced'],
        data: [
            ['EPÓXICO HD1 AS NEGRO', 29.9, false],
            ['XCLO PRIMER UNIVERSAL GRIS', 71.5, false],
            ['XCLO BASE COLOR ALUMINIO FINO BRILLANTE', 106.4, false],
            ['XCLO BODY FILLER', 129.2, false],
            ['XCLO BASE COLOR AMARILLO CROMO', 144.0, false],
            ['3M COMPUESTO PULIDOR', 176.0, false]
           
        ],
        showInLegend: true
    }]
});
</script>
<style type="text/css" media="screen">
    
@import 'https://code.highcharts.com/css/highcharts.css';

.highcharts-pie-series .highcharts-point {
    stroke: #EDE;
    stroke-width: 2px;
}
.highcharts-pie-series .highcharts-data-label-connector {
    stroke: silver;
    stroke-dasharray: 2, 2;
    stroke-width: 2px;
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 600px;
    margin: 1em auto;
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