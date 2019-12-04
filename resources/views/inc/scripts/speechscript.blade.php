@section('script')
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btPlay").click(function(){
                var text = $("#text").val();
                var gender = $("#gender").val();
                responsiveVoice.speak(text, gender, {rate: 1});
                $("#btStop").removeAttr("disabled");
            });

            $("#btStop").click(function(){
                responsiveVoice.cancel();
                $("#btStop").attr("disabled","disabled");
            });
        });
    </script>
@endsection