<script>
    var vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
        <?php echo count($total_vehicles->where('day' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
        ];

    showChart(vlable);

    function showChart(vlable){
        $(document).ready(function() {
            var $primary = '#7367F0';
            var $success = '#28C76F';
            var $danger = '#EA5455';
            var $warning = '#FF9F43';
            var $yellow = '#FADA5E';
            var $gray = '#828282';
            var $primary_light = '#A9A2F6';
            var $success_light = '#55DD92';
            var $warning_light = '#ffc085';

            // Subscribed Gained Chart
            // ----------------------------------

            // Order Received Chart
            // ----------------------------------

            var orderChartoptions = {
                chart: {
                    height: 100,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    },
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                },
                colors: [$warning],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: 'Total Vehicles',
                    data: vlable
                }],

                xaxis: {
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            }

            var orderChart = new ApexCharts(
                document.querySelector("#line-area-chart-4k"),
                orderChartoptions
            );

            orderChart.render();
            });
    }
  </script>
