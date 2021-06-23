<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>public/jquery-validate/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('#btn-guardar').click(function(e){
            // e.preventDefault();

            $('#Form_crear_entrada').validate({
                rules:{
                    titulo: {required: true},
                    descripcion: {required: true, minlength: 5}
                },
                messages:{
                    titulo:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
                    },
                    descripcion: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
						minlength: '<br><div class="alert alert-danger ml-2" role="alert"> Minimo se deben introducir 5 caracteres</div>'
                    }
                }
            })
        });
});

</script>


<script type="text/javascript">
    $(document).ready(function(){
        
        $("#btn-buscarmsj").click(function(e){
            e.preventDefault();

            if($("#buscar").val() != ''){
                $.ajax({
                url: '<?=base_url()?>Mensajes/buscar',
                data: $("#form_buscar").serialize(),
                type: 'post',

                    beforeSend: function(){
                        let spinner;
                        
                        spinner = "<div style='margin-left: 575px'>"
                        spinner += "<div class='sk-chase'>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "</div>"


                        $("#clima").html(spinner);
                    },

                
                    success: function(data) {
                        var datos = JSON.parse(data);
                        console.log(datos);

                        var newCard = ''
                        $.each(datos,function(i,item){

                            newCard +=
                                "<div class='col-3'>"
                                +"<div class='card' style='width: 18rem;'>"
                                +"<div class='card-body'>"
                                +"<h3 class='card-title'>"+ datos[0].titulo +"</h3>"
                                +"<h6 class='card-subtitle mb-2 text-muted'>"+ datos[0].fecha +"</h6>"
                                +"Usuario: <span class='fw-bold'>"+ datos[0].nombre +"</span>"
                                +"<p class='card-text'>"+ datos[0].descripcion +"</p>"
                                +"</div>"
                                +"</div>"
                                +"</div>"
                            
                        });

                        $(".row").html(newCard);
                
                    }
                });
            }else{
                    alert("Todos los campos son obligatorios");
                    return false;
                }
                return false;
        });
    });
</script>