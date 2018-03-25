function enabledEditTask(){
    $("#task_description").prop("readonly", false);
    $("#status").prop("disabled", false);
    $("#date").prop("disabled", false);
    $("#task_range").prop("disabled", false);

    $("#editTask").after("<button type='submit' class='btn btn-primary' id='updateTask'>Update</button>");

    $("#updateTask").after("&nbsp;&nbsp;<button type='button' class='btn btn-primary' id='cancelTask' onclick='window.location.reload()'>Cancel</button>");

    $("#editTask").remove();
}

function setComment(taskID, coloring){

    var body = $("#body").val();

    if(body == ""){
      $("#bodyGroup").addClass("has-error");
      return false;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
           type: "POST",
           url: '/tasktodo/public/comment',
           data: {body: body, taskID: taskID, coloring: coloring},
           success: function(data) {
               $("#test").append(data);
               $("#bodyGroup").removeClass("has-error");

               $("#noComment").hide();

               $("html, body").animate({ scrollTop: $(document).height() }, 1000);
           }
       });

}
