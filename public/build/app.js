$(function () {
	
	$("#palindromeFrm").on("submit", function (e) {
		e.preventDefault();
     	$("code").text("");
        var string = $('#string').val();
        $.ajax({
            type: "POST",
            url: "/palindrome/check",
            data: { string: string},
            beforeSend: function () {
               $("code").text("").removeClass('text-primary').removeClass('text-danger');
            },
            success: function (data) {
                console.log(data);
                if(data.status === true){
                	$("code").addClass('text-primary').text("It's a Palindrome");
                } else {
                	$("code").addClass('text-danger').text("It's not a Palindrome");
                }
            },
            complete: function () {
            },
        });
       
    });


    $("#strRevFrm").on("submit", function (e) {
		e.preventDefault();
     	$("code").text("");
        var string = $('#string').val();
        $.ajax({
            type: "POST",
            url: "/string-reverse/get",
            data: { string: string},
            beforeSend: function () {
                $("code").text("").removeClass('text-primary').removeClass('text-danger');
            },
            success: function (data) {
                console.log(data);
                if(data.status === true){
                	$("code").addClass('text-primary').text(data.string);
                } else {
                	$("code").addClass('text-danger').text("some error");
                }
            },
            complete: function () {
            },
        });
       
    });

});