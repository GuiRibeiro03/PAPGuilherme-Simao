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






    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function preview_image2(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image2');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

</script>


<div style="height: 60px;  background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Nova Notícia</span></div>

<section class="store" style="margin:50px">

    <a href="../backoffice/Backoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>

<form action="../Confirma/confirmaNovaNoticia.php" method="post" enctype="multipart/form-data">
    <h4>Titulo:</h4>
    <input type="text" name="noticiaTitulo"  style="width: 50%;">
    <br>
    <br>


    <div id="wrapper" style="color: #FFFFFF">
        <span class="badge badge-dark">Imagem Fundo URL</span>
        <input type="file" accept="image/*" name="noticiaImagemFundoURL" onchange="preview_image(event)">
        <img id="output_image"/>
    </div>
    <br>
    <div id="wrapper" style="color: #FFFFFF">
        <span class="badge badge-dark">Imagem secundária URL</span>
        <input type="file" accept="image/*" name="noticiaImagemURL" onchange="preview_image2(event)">
        <img id="output_image2"/>
    </div>
    <br>

    <div style="width: 70%;">
        <h4>Desenvolvimento:</h4>
        <textarea name="noticiaDesenvolvimento" id="myTextarea" ></textarea>
    </div>


<br>

    <div style="margin-top: 40px; margin-bottom: 40px">
        <h4>Data:</h4>
        <input type="date" name="noticiaData">

    </div>


    <div style="color: #FFFFFF; margin-top: 50px">
        <label>Nossas Escolhas:</label>
        <p><input type="radio" name="noticiaEscolha" value="sim" >&nbsp;Sim</p>
        <p><input type="radio" name="noticiaEscolha" value="nao" checked>&nbsp;Não</p>
    </div>

    <input type="Submit" class="btn btn-danger" value="Adiciona"><br>

</form>
</section>








<?php




bottom();
?>



