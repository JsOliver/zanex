<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Armazenando imagens no banco de dados Mysql</title>
</head>
<body>
<img id="imageexibe" style="width: 100px;" src="<?php echo base_url('profile?id=37');?>">
<h2>Selecione um novo arquivo de imagem</h2>
<script>
    var file = 'fileUpload';
    var input = 'btnEnviar';
    var url = '<?php echo base_url('pages/image');?>';
    var preview = 'imageexibe';
</script>

<form enctype="multipart/form-data"  method="post">
    <div><input id="fileUpload" name="fileUpload" type="file"/></div>
    <div><a id="btnEnviar" >Enviar</a></div>
    <span id="errorData"></span>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" id="ajax-upload">
    $(function () {

        var form;
        $('#'+file+'').change(function (event) {
            form = new FormData();
            form.append(file, event.target.files[0]);
        });

        $('#'+input+'').click(function () {
            $("#errorData").html('Carregando...');

            $.ajax({
                url: url,
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {

                    if(data > 0){
                        $("#"+preview+"").attr("src","<?php echo base_url('profile?id=');?>"+data+"");
                        $("#errorData").html('');

                    }else
                    {
                        $("#errorData").html(data);
                    }

                }
            });
        });
    });
</script>
</body>
</html>