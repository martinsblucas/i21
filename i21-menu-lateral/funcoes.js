$(document).ready(function(){
  $('#searchform.search-form').on("click",(function(e){
  $("#searchform.search-form .form-group").addClass("sb-search-open");
    e.stopPropagation()
  }));
   $(document).on("click", function(e) {
    if ($(e.target).is("#searchform.search-form") === false && $("#searchform.search-form .form-control").val().length == 0) {
      $("#searchform.search-form .form-group").removeClass("sb-search-open");
    }
  });
})
$(document).ready(function(){
  $('#searchform.search-form-m').on("click",(function(e){
  $("#searchform.search-form-m .form-group").addClass("sb-search-open");
    e.stopPropagation()
  }));
   $(document).on("click", function(e) {
    if ($(e.target).is("#searchform.search-form-m") === false && $("#searchform.search-form-m .form-control").val().length == 0) {
      $("#searchform.search-form-m .form-group").removeClass("sb-search-open");
    }
  });
})