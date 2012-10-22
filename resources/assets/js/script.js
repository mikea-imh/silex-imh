(function($) {
    $(function(){
        $('.hosting-plan-details a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
    });
})(jQuery);
