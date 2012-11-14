
(function($) {
    $(function(){
        $('.hosting-plan-details a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        });
        
        // Apply classes to each table cell indicating column
        var numCols = $('colgroup').length;
        $('#specifications td, #specifications th').each(function(i) {
            $(this).addClass('table-col-' + ((i % numCols) + 1));
        });
        // set tabindex on #main and #nav so they can be focus and work with webkit
        $('#main').attr('tabindex',-1);
        $('#nav').attr('tabindex',-1);

        // add placeholder text for browsers that do not support placeholder attribute
        if (!Modernizr.input.placeholder) {
          $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
              input.val('');
            //input.removeClass('placeholder');
            }
          }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
              input.addClass('placeholder');
              input.val(input.attr('placeholder'));
            }
          }).blur();
          $('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
              var input = $(this);
              if (input.val() == input.attr('placeholder')) {
                input.val('');
              }
            });
          });
        }
        // fix webkit skip links tabindex
        $("a[href^='#']").not("a[href='#']").click(function() {
            // get the href attribute of the internal link
            // then strip the first character off it (#)
            // leaving the corresponding id attribute
            $("#"+$(this).attr("href").slice(1)+"")
            // give that id focus (for browsers that didn't already do so)
            .focus();
            // add a highlight effect to that id (comment out if not using)
            //.effect("highlight", {}, 3000);
        });
  });
})(jQuery);