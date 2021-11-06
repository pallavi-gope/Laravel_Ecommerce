//[editor Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the wysihtml5 Editor 


//Add text editor
$(function() {
    "use strict";
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();

});