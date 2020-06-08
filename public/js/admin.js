
tinymce.init({
    selector: '#description',
    plugins: [
        'advlist autolink lists link image imagetools charmap print preview anchor directionality ',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code table textcolor imagetools colorpicker'
    ],
    toolbar: 'insertfile media image undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontsizeselect | table tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | link forecolor backcolor',
});