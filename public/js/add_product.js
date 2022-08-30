function getSubCategory(){
    var category_id = $('#category').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        // url : "get-sub-products",
        url: "product/get-sub-products",
        data:{category_id : category_id},
        type: "POST",
        cache: false,
        success: function(html){
            $("#sub_category").empty();
          $("#sub_category").append(html.res);
        }
      });
}