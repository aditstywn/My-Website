$(document).ready(function(){
    $("#keyword").on("keyup", function(){
        $.get("../ajax/produk.php?keyword=" + $("#keyword").val(),function(data){
            $("#container").html(data);
        });
    });
});