        <script>
            var chart_vlabels=[
            <?php for($i = 0;$i < $visitors_limit;$i++): ?>
            <?php echo count($visitors_vlable->where('hour' , $i)); ?>
            <?php if($i < ($visitors_limit-1)): ?>, <?php endif;endfor; ?>
            ];

            var chart_labels = [
            <?php for($i = 0;$i < $visitors_limit;$i++): ?>
            "Hr <?php  echo $i+1; ?>"
            <?php if($i < ($visitors_limit-1)): ?> , <?php endif;endfor; ?>
            ];
            var target_id="#{{$request->target_id}}";
            showCharts(target_id,250,"Total Website Visits",chart_labels,chart_vlabels);

            function showCharts(target_id='',chart_height='',chart_title='',lable='',vlable='')
            {
                $(document).ready(function() {
                var $primary = '#7367F0',
                $success = '#28C76F',
                $danger = '#EA5455',
                $warning = '#FF9F43',
                $info = '#00cfe8',
                $label_color_light = '#dae1e7';

                var themeColors = [$primary, $success, $danger, $warning, $info];

                    // RTL Support
                    var yaxis_opposite = false;
                    if ($('html').data('textdirection') == 'rtl') {
                        yaxis_opposite = true;
                    }
                        var lineChartOptions = {
                            chart: {
                                height: chart_height,
                                type: 'line',
                                zoom: {
                                    enabled: false
                                }
                            },
                            colors: themeColors,
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            series: [{
                                name: "Visits",
                                data: vlable,
                            }],
                            title: {
                                text: chart_title,
                                align: 'left'
                            },
                            grid: {
                                row: {
                                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                    opacity: 0.5
                                },
                            },
                            xaxis: {
                                categories: lable,
                            },
                            yaxis: {
                                tickAmount: 5,
                                opposite: yaxis_opposite
                            }
                    }

                    var lineChart = new ApexCharts(
                        document.querySelector(target_id),
                        lineChartOptions
                    );
                    lineChart.render();
                    });
            }
    </script>
