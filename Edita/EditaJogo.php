<?php
include_once("../includes/body.inc.php");
top();


$con=mysqli_connect("localhost","root","","pap2021gameon");
$id=intval($_GET["id"]);
$sql="select * from jogos where jogoId=".$id;
$resultjogos=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($resultjogos);

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



<div style="color: #FFFFFF" xmlns="http://www.w3.org/1999/html">
</div>


<form action="../Confirma/confirmaEditaJogo.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" style="color: #FFFFFF; margin-left: 30px">
    <a href="../backoffice/jogosBackoffice.php"><button type="button"  class="btn btn-primary">Voltar</button></a>
<h2>Editar Jogo</h2>
<hr>
    <div><img id="output_image" src="<?php echo $dados["jogoImagemURL"] ?>" style="margin-left: 20px; margin-bottom: 20px; width: 300px; height: 400px"/></div>
    <input type="file" name="jogoImagemURL" accept="image/*" onclick="preview_image(event)">


  <div style="margin-top: 20px">

      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Nome:</label>
    <input type="text" name="jogoNome" value="<?php echo $dados["jogoNome"]?>">

      <hr>
      <label style="color:white; font-size: 15px" class="badge badge-dark">Preço: </label>
    <input type="text" name="jogoPreco" value="<?php echo $dados["jogoPreco"]?>">

      <hr>
      <div style="width: 70%;">
          <h4>Sinopse:</h4>
          <textarea name="jogoSinopse" id="myTextarea"  content="<?php echo $dados["jogoSinopse"] ?>"><?php echo $dados["jogoSinopse"] ?></textarea>
      </div>
      <hr>

      <label style="color:white; font-size: 15px" class="badge badge-dark">Trailer:</label>
      <input type="text" name="jogoTrailer" value="<?php  echo $dados["jogoTrailer"]?>">
      <hr>

      <label style="color:white; font-size: 15px" class="badge badge-dark">Empresa</label>



      <select class="form-select"  aria-label="Default select example" name="jogoEmpresaId">
          <option value="-1">Escolha a empresa...</option>
          <?php
          $sql="select * from empresas order by empresaNome";
          $result=mysqli_query($con,$sql);
          while ($dadosEmpresas=mysqli_fetch_array($result)){
              ?>
              <option value="<?php echo $dadosEmpresas['empresaId']?>"
              <?php
              if($dados["jogoEmpresaId"]==$dadosEmpresas["empresaId"])
                    echo "Selected" ;

                  ?>
                  >
                <?php echo $dadosEmpresas["empresaNome"] ?>
              </option>
              <?php
          }


          ?>
      </select>




      <div style="color: #FFFFFF; margin-top: 50px">
          <label style="color:white; font-size: 15px" class="badge badge-dark">Produto em destaque:</label>
          <p><input type="radio" name="jogoDestaque" value="sim" <?php if ($dados['jogoDestaque'] == 'sim') { echo "checked";} ?> >&nbsp;Sim</p>
          <p><input type="radio" name="jogoDestaque" value="nao" <?php if ($dados['jogoDestaque'] == 'nao') { echo "checked";} ?>>&nbsp;Não</p>
      </div>

    </div>
<hr>

    <input type="Submit" class="btn btn-danger" value="Edita"><br>
</form>
<br>
<script>
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
</script>

<?php
bottom();
?>
