<?php
include_once ("../includes/body.inc.php");
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

<form action="../Confirma/confirmaAdicionaProduto.php" method="post"  enctype="multipart/form-data" style="color: #FFFFFF; margin: 20px">
    <div class="mb-3">
        <label style="color:white; font-size: 15px; margin-top: 5%" class="badge badge-dark">Nome:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="produtoNome">
    </div>
    <div class="mb-3">
        <label style="color:white; font-size: 15px; margin-top: 5%" class="badge badge-dark">Descrição:</label>
        <textarea name="produtoDescricao" id="myTextarea"></textarea>
    </div>
    <div class="mb-3">
        <label style="color:white; font-size: 15px; margin-top: 5%" class="badge badge-dark">Preço:</label>
        <input type="text" class="form-control" name="produtoPreco" >
    </div>
    <div class="mb-3">
        <div id="wrapper" style="color: #FFFFFF">
            <input type="file" accept="image/*" name="produtoImagemURL" onchange="preview_image(event)">
            <div style="height: 20px"></div>
            <img id="output_image"/>
        </div>
    </div>

    <label style="color:white; font-size: 15px; margin-top: 5%" class="badge badge-dark">Tipo:</label>
    <div style="color: #FFFFFF; margin-top: 50px">
        <label>Produto em destaque:</label>
        <p><input type="radio" name="produtoTipo" value="consola" checked>&nbsp;Consola</p>
        <p><input type="radio" name="produtoTipo" value="acessório" >&nbsp;Acessório</p>
        <p><input type="radio" name="produtoTipo" value="outlet" >&nbsp;Outlet</p>
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Adiciona</button>
</form>






<?php
bottom();
?>
