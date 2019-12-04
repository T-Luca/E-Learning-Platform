@section('script')
<script>
    var count = <?php echo count($array); ?>;
    var inc;
    var correct = 0;
    var checked = false;
    var isCorrect = new Array(count).fill(0);
    for (inc = 1; inc<count; inc++){
        var x = document.getElementById("container"+inc);
        x.style.display = "none";
    }

    function nextWord(z) {
        event.preventDefault();
        if(z<count){
            if(checked == false && document.getElementById("w2id"+z).value == document.getElementById("checkid"+z).value) {
                isCorrect[z] = 1;
                correct++;
            }
            if(!isCorrect.includes(0)) {
                document.form.result.value = correct;
                document.forms["form"].submit();
            }
            else{
                var bar = document.getElementById("bar");
                bar.setAttribute("style", "width:"+(correct/count)*100+"%");
                var x = document.getElementById("container"+z);
                x.style.display = "none";
                document.getElementById("w2id"+z).value = "";
                if(z == count-1) z=0;
                else z++;
                while(isCorrect[z] == 1){
                    if(z == count-1) z=0;
                    else z++;
                }
                var y = document.getElementById("container"+z);
                y.style.display = "block";
                checked = false;
                document.getElementById("w2id"+z).focus();
            }
        }
    }

    function checkWord(z) {
        event.preventDefault();
        if(checked == false){
            checked = true;
            if(document.getElementById("w2id"+z).value == document.getElementById("checkid"+z).value) {
                isCorrect[z] = 1;
                correct++;
                window.alert('Corect!');
            }
            else window.alert('Cuvânt greșit, corect: '+document.getElementById("checkid"+z).value);
        }
    }
</script>
@endsection