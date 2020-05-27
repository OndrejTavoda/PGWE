$(document).ready(function() {
    $(".updateForm").hide();
    $("#login-submit").on("click", function(e){
        e.preventDefault();
        console.log("Submit Button Overrriden by Jquery");
        var username = $("#login-username").val();
        var password = $("#login-password").val();
        var action = $("#action").val();
        console.log(username +" "+ password+" "+action);
        $.ajax({
            url: "router.php",
            method: "GET",
            dataType: "text",
            data: {
                username:username,
                password:password,
                action:action
            }
        
        }).done(function(returnData) {
            console.log(returnData);
            location.reload();
        })

    })
    $(".btn-warning").on("click", function(e){
        e.preventDefault();
        console.log("Submit Button Overrriden by Jquery");
        $(".updateForm").show();
    })
    $("#hide_done").on("click", function(e){
        e.preventDefault();
        console.log("Hide done!");
        $(".1").hide();
        $(".0").show();
    })
    $("#hide_undone").on("click", function(e){
        e.preventDefault();
        console.log("Show done!");
        $(".0").hide();
        $(".1").show();
    })
    $("#all").on("click", function(e){
        e.preventDefault();
        console.log("Show done!");
        $(".0").show();
        $(".1").show();
    })

    // $("#exportJSON").on("click", function(e){
    //     e.preventDefault();
    //     console.log("Export Tasks!");
    //     var action = $("#action").val();
    //     $.ajax({
    //         url: "router.php",
    //         method: "GET",
    //         dataType: "text",
    //         data: {
                
    //             action:action
    //         }
        
    //     }).done(function(returnData) {
    //         console.log(returnData);
    //         //location.reload();
    //     })

    // })

    

})