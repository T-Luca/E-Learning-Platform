@section('script')
<script>
    var count = <?php echo count($array); ?>;
    var inc;
    var correct = 0;
    var checked = false;
    for (inc = 1; inc<count; inc++){
        var x = document.getElementById("container"+inc);
        x.style.display = "none";
    }

    function nextWord(z) {
        event.preventDefault();
        if(z<count){
            if(checked == false && document.getElementById("w2id"+z).value == document.getElementById("checkid"+z).value) {
                correct++;
            }
            if(z<count-1){
                var x = document.getElementById("container"+z);
                var y = document.getElementById("container"+(z+1));
                x.style.display = "none";
                y.style.display = "block";
                checked = false;
                document.getElementById("w2id"+(z+1)).focus();
            }
            if(z==count-1) {
                document.form.result.value = correct;
                document.forms["form"].submit();
            }
        }
    }

    function checkWord(z) {
        event.preventDefault();
        if(checked == false){
            checked = true;
            if(document.getElementById("w2id"+z).value == document.getElementById("checkid"+z).value) {
                correct++;
                window.alert('Corect!');
            }
            else window.alert('Cuvânt greșit, corect: '+document.getElementById("checkid"+z).value);
        }
    }
</script>
@endsection