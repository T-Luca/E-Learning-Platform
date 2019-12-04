@section('script')
<script>
    var count = <?php echo count($array); ?>;
    var inc;
    var corect = 0;
    var mirrored = 0;
    for (inc = 1; inc<count; inc++){
        var x = document.getElementById("container"+inc);
        x.style.display = "none";
    }

    function nextWord(z, v) {
        event.preventDefault();
        if(v == 1) corect++;
        if(z<count){
            if(z<count-1){
                if(mirrored%2 != 0) flip();
                var x = document.getElementById("container"+z);
                var y = document.getElementById("container"+(z+1));
                x.style.display = "none";
                y.style.display = "block";
                mirrored = 0;
            }
            if(z==count-1) {
                document.form.result.value = corect;
                document.forms["form"].submit();
            }
        }
    }

    function flip() {
        event.preventDefault();
        $('.flashcard').toggleClass('flipped');
        mirrored++;
    }
</script>
@endsection