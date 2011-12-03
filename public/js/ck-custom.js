function setUpCK() {
	if(document.getElementById('body')) {
        var oCKeditor = new CKeditor('body') ;
        oCKeditor.BasePath = "/js/ckeditor/" ;
        oCKeditor.Height = 400;
        oCKeditor.ReplaceTextarea() ;
    }

}