<script>
    Highcharts.chart('graficoGastosGanhos', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'GASTOS x GANHOS',
            align: 'center'
        },
        subtitle: {
            text: 'Meu Controle',
            align: 'center'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 120,
            y: 70,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                @foreach($graficos['grafico1'] as $mesAno => $valores)
                    `{{ $mesAno }}`,
                @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Valores'
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>R$ {point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        colors: ['#00b3ff', '#ff0000'],
        series: [{
            name: 'Entradas',
            data:
                [
                    /*800, 0, 400, 200, 350, 0, 430,*/
                    @foreach($graficos['grafico1'] as $mesAno => $valores)
                        {{ $valores['ENTRADA'] }},
                    @endforeach

                ]
        }, {
            name: 'Saidas',
            data:
                [
                    @foreach($graficos['grafico1'] as $mesAno => $valores)
                        {{ $valores['SAIDA'] }},
                    @endforeach
                ]
        }]
    });
</script>
