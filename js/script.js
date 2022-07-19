$(function(){

    var product_id;
    var elemet_deleted;

    $(".btn_delete").click(function(){
        
        product_id = $(this).attr("rel");
        
        elemet_deleted = $(this).parent().parent();
    });

    $(".deleted_yes").click(function(){

        //JSON method.
        var datasend = {"product_id" : product_id};

        // $.post function found in AJAX.
        $.post("ajaxdeleteproduct.php", datasend , function(data){
            if(data == "yes")
            {
                elemet_deleted.fadeOut(500);
            }
            else
            {
                alert("Unexpected Error!");
            }

        });
    });

});