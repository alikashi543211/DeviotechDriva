<script>
var vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
        <?php echo $profile_views->where('day' , $i)->sum("no_of_views"); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
        ];

// // Avg Session Chart Starts
//     // ----------------------------------
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

    var sessionChartoptions = {
        chart: {
            type: 'bar',
            height: 200,
            sparkline: { enabled: true },
            toolbar: { show: false },
        },
        states: {
            hover: {
                filter: 'none'
            }
        },
        colors: [$primary, $primary, $primary, $primary, $primary, $primary],
        series: [{
            name: 'Views',
            data: vlable
        }],
        grid: {
            show: false,
            padding: {
                left: 0,
                right: 0
            }
        },

        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true,
                endingShape: 'rounded'
            }
        },
        tooltip: {
            x: { show: false }
        },
        xaxis: {
            type: 'numeric',
        }
    }

    var sessionChart = new ApexCharts(
        document.querySelector("#avg-session-chart"),
        sessionChartoptions
    );

    sessionChart.render();

</script>
