(function($) {
    $(function(){
        $('.hosting-plan-details a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
        
        // Apply classes to each table cell indicating column
        var numCols = $('colgroup').length;
        $('#specifications td, #specifications th').each(function(i) {
            $(this).addClass('table-col-' + ((i % numCols) + 1));
        });
    });
})(jQuery);
