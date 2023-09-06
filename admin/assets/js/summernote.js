(function($) {
  "use strict";

    /*------------------------	
        Payment Form Submit
      ----------------------------*/
    $('.summernote').summernote({
      tabsize: 2,
      height: 200,
        toolbar: [
        // [groupName, [list of button]]
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph','height','style']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr','video','table']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
        ['Misc',['undo','redo']]
       
      ]
    });
    
})(jQuery);