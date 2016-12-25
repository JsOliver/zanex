<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Armazenando imagens no banco de dados Mysql</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<img id="imageexibe" style="width: 100px;" src="<?php echo base_url('profile?id=19');?>">
<h2>Selecione um novo arquivo de imagem</h2>




<form enctype="multipart/form-data"  method="post">
    <div><input id="fileUpload" name="fileUpload" type="file"/></div>
    <div><a id="btnEnviar" >Enviar</a></div>
</form>


<script>

    $(function () {

        var form;
        $('#fileUpload').change(function (event) {
            form = new FormData();
            form.append('fileUpload', event.target.files[0]); // para apenas 1 arquivo
            //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
        });

        $('#btnEnviar').click(function () {
            $.ajax({
                url: '<?php echo base_url('pages/image');?>', // Url do lado server que vai receber o arquivo
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {

if(data > 0){
    $("#imageexibe").attr("src","<?php echo base_url('profile?id=');?>"+data+"");

}else
{
    alert(data);
}

              }
            });
        });
        });
    </script>
</body>
</html>
