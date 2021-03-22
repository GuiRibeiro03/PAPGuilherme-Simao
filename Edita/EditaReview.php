<?php
include_once("../includes/body.inc.php");
top();
?>

<link href="summernote.css" rel="stylesheet">
<script src='../js/tinymce/tinymce.min.js'></script>
<script>



    tinymce.init({
        selector: 'textarea#myTextarea',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
        link_list: [
            { title: 'My page 1', value: 'https://www.codexworld.com' },
            { title: 'My page 2', value: 'https://www.xwebtools.com' }
        ],
        image_list: [
            { title: 'My page 1', value: 'https://www.codexworld.com' },
            { title: 'My page 2', value: 'https://www.xwebtools.com' }
        ],
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
        },
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });

</script>

<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Edita Review</span></div>

<section class="store" style="margin-top: 100px; margin-left: 50px">
    <a href="../reviews.php"><button type="button" class="btn btn-danger">Voltar</button></a>





    <form action="../Edita/ConfirmaEditaReview.php" method="post" enctype="multipart/form-data" style="color: #FFFFFF; font-size: 18px; width: 100%">


        <div id="wrapper" style="color: #FFFFFF; margin-bottom: 5%">
            <input type="file" accept="image/*" name="reviewImagemURL" onchange="preview_image(event)">
            <div style="height: 50px">
            <img id="output_image"/></div>
        </div>
        <br>


        <div class="mb-3">
            <label  class="form-label">Titulo</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="reviewNome" style="width: 40%" autofocus>
        </div>


         <div style="width: 70%;">
            <h4>Texto:</h4>
            <textarea name="reviewTexto" id="myTextarea" ></textarea>
        </div>

        </div>


        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" >
            <label class="form-check-label" >
                Review
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" >
            <label class="form-check-label" >
                Jogo
            </label>

        </div>
        <input type="Submit" value="Adicionar" style="width: 100px; height: 50px">



    </form>
</section>



<?php
bottom();
?>



