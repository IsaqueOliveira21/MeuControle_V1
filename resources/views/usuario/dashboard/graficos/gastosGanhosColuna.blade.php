<script>
    Highcharts.chart('graficoGastosGanhosColuna', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'GASTOS x GANHOS'
        },
        subtitle: {
            text: 'Meu Controle'
        },
        xAxis: {
            categories: [
                @foreach($graficos['grafico2'] as $mesAno => $valores)
                    `{{ $mesAno }}`,
                @endforeach
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Valores'
            }
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
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        colors: ['#00b3ff', '#ff0000'],
        series: [{
            name: 'Entradas',
            data: [
                @foreach($graficos['grafico2'] as $mesAno => $valores)
                    {{ $valores['ENTRADA'] }},
                @endforeach
            ]

        }, {
            name: 'Saidas',
            data: [
                @foreach($graficos['grafico2'] as $mesAno => $valores)
                    {{ $valores['SAIDA'] }},
                @endforeach
            ]

        },]
    });
</script>
