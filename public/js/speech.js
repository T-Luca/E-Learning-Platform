$('document').ready(function() {
    $('.textInput').hide();
    $('.convo').hide();
    responsiveVoice.setDefaultVoice("US English Female");

    $('#tahead').typeahead();

    $('#helpBtn').on('click', function() {
        $(this).addClass('selected');
        $("#kbBtn, #talkBtn").removeClass('selected');
        $("section:not('.whatIsThis')").hide();
        $(".whatIsThis").show();
    });

    $('#kbBtn').on('click', function() {
        $(this).addClass('selected');
        $("#helpBtn, #talkBtn").removeClass('selected');
        $("section:not('.textInput')").hide();
        $(".textInput").show();
    });

    $('#talkBtn').on('click', function() {
        $(this).addClass('selected');
        $("#kbBtn, #helpBtn").removeClass('selected');
        $("section:not('.convo')").hide();
        $(".convo").show();
    });


    $("#sayIt").on("click", function() {
        var speech = $("#talkBox").val();
        if (speech === "") { speech = "Please type a word or phrase in the box"; }
        responsiveVoice.speak(speech);
    });

    $('#clearIt').on('click', function() {
        $('#talkBox').val('');
    });


    $('#boy').on('click', function() {
        responsiveVoice.setDefaultVoice("UK English Male");
        responsiveVoice.speak('Hello');
    });
    $('#girl').on('click', function() {
        responsiveVoice.setDefaultVoice("US English Female");
        responsiveVoice.speak('Hello');
    });


    $('.convo button:not("#alertBtn")').on('click', function() {
        responsiveVoice.speak(this.value);
    });

    var bell = document.getElementById('bell');
    $('#alertBtn').on('click', function() {
        bell.play();
    });
});