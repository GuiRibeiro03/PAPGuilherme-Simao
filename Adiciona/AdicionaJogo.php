    <?php
include_once("../includes/body.inc.php");
top();
$con=mysqli_connect("localhost","root","","pap2021gameon");

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

<div style="height: 60px; width: 100%; background-color: red;"><span style="padding-left: 40%; font-size: 30px; color: #fff; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Adicionar Novo Jogo</span></div>

<section class="store" style="padding:50px">

    <a href="../backoffice/jogosBackoffice.php"><button type="button" class="btn btn-danger">Voltar</button></a>
<hr>
<form action="../Confirma/confirmaNovoJogo.php" method="post" enctype="multipart/form-data">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Nome: </label>
    <input type="text" style="width: 300px" name="jogoNome"><hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Sinopse: </label>
    <textarea name="jogoSinopse" id="myTextarea" ></textarea>
<hr>
    <label style="color:white; font-size: 15px" class="badge badge-dark">Link do Trailer (Codigo Embebido): </label>
    <input type="text" style="height: 99%;" name="jogoTrailer"><hr>


    <label style="color:white; font-size: 15px" class="badge badge-dark">Imagem:</label>
    <input type="file" accept="image/*" name="jogoImagemURL" onchange="preview_image(event)" style="color: darkgray">
    <img id="output_image"/><hr>

    <label style="color:white; font-size: 15px" class="badge badge-dark">Preço:</label>
    <input type="text" name="jogoPreco" style="width: 100px"><hr>


    <label style="color:white; font-size: 15px" class="badge badge-dark">Rating:</label>
    <input type="text" name="jogoGlobalRating" style="width: 100px"><hr>



    <div class="row">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Empresa</label>
    <select name="jogoEmpresaId">
        <option value="-1">Escolha a empresa...</option>
        <?php
        $sql="select * from empresas order by empresaNome";
        $result=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dados['empresaId']?>"><?php echo $dados['empresaNome']?></option>
            <?php
        }


        ?>
    </select>
<br>
    <label style="color:white; font-size: 15px" class="badge badge-dark">Plataforma</label>
    <select name="jogoPlataformaId">
        <option value="-1">Escolha a plataforma...</option>
        <?php
        $sql="select * from plataformas order by plataformaNome";
        $result=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dados['plataformaId']?>"><?php echo $dados['plataformaNome']?></option>
            <?php
        }


        ?>
    </select>
<br>
    <label style="color:white; font-size: 15px" class="badge badge-dark">Género</label>
    <select name="jogoGeneroId">
        <option value="-1">Escolha o género...</option>
        <?php
        $sql="select * from generos order by generoNome";
        $result=mysqli_query($con,$sql);
        while ($dados=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $dados['generoId']?>"><?php echo $dados['generoNome']?></option>
            <?php
        }


        ?>
    </select>

    </div>
<hr>



<div style="color: #FFFFFF; margin-top: 50px">
    <label style="color:white; font-size: 15px" class="badge badge-dark">Produto em destaque:</label>
  <p><input type="radio" name="jogoDestaque" value="sim" >&nbsp;Sim</p>
  <p><input type="radio" name="jogoDestaque" value="nao" checked>&nbsp;Não</p>
    </div>


    <input type="Submit" class="btn btn-danger" value="Adiciona"><br>

</form>
</section>


<?php
bottom();
?>



