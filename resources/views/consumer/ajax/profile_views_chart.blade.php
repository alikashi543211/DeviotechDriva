<script>
var vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
        <?php if($req->chart=="last_month"): echo count($total_bookings->where('week' , $i)); elseif($req->chart=="last_year"): echo count($total_bookings->where('month' , $i)); else: echo count($total_bookings->where('day' , $i)); endif; ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
        ];
        // alert("{{$cancelled_bookings_count}}");
        $(".booking-total-count").html("{{$total_bookings_count}}");
        $(".completed-count-info").html("{{$completed_bookings_count}}");
        $(".delayed-count-info").html("{{$delayed_bookings_count}}");
        $(".reported-count-info").html("{{$reported_bookings_count}}");
        $(".cancelled-count-info").html("{{$cancelled_bookings_count}}");
        var target_id="#{{$req->id}}";
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
            name: 'Bookings',
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
        document.querySelector(target_id),
        sessionChartoptions
    );

    sessionChart.render();

</script>
