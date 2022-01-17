
<script>
var vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
        <?php echo count($complete_bookings->where('day' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
        ];

var $primary = '#7367F0';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $info = '#0DCCE1';
        var $primary_light = '#8F80F9';
        var $warning_light = '#FFC085';
        var $danger_light = '#f29292';
        var $info_light = '#1edec5';
        var $strok_color = '#b9c3cd';
        var $label_color = '#e7eef7';
        var $white = '#fff';
            // height:100 and width 2.5
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
        name: 'Bookings',
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
            document.querySelector("#orders-received-chart"),
            orderChartoptions
        );

        orderChart.render();
</script>
