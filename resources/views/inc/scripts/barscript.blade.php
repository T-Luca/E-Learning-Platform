@section('script')
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        var data1 = <?php echo $res; ?>;

        $("#chart1").shieldChart({
            seriesSettings: {
                splinearea: {
                    dataPointText: {
                        enabled: true,
                        backgroundColor: "yellow"
                    }
                }
            },
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Progres"
                }
            },
            dataSeries: [{
                seriesType: "splinearea",
                color: "red",
                innerColor: "blue",
                data: data1
            }]
        });
    });
</script>
@endsection