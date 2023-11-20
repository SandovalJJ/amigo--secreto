<!DOCTYPE html>
<html lang="en">

<head>

    @include('layaut.head')
    <title>Parejas</title>

    <script src="./assets/js/ajax-googleapis.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <!-- Datatables -->
    <link rel="stylesheet" href="./assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ContentTools/1.6.10/content-tools.min.css">
    <script src="./assets/js/datatables.min.js"></script>

    <!-- Buttons -->
    <link rel="stylesheet" href="./assets/css/buttons.dataTables.min.css">
    <script src="./assets/js/dataTables.buttons.min.js"></script>
    <script src="./assets/js/js_buttons.html5.min.js"></script>
    <script src="./assets/js/vfs_fonts.js"></script>
    <script src="./assets/js/buttons.flash.min.js"></script>
    <script src="./assets/js/buttons.print.min.js"></script>
    <script src="./assets/js/jszip.min.js"></script>
    <style>
        #mydatatable tfoot input {
            width: 100% !important;
        }

        #mydatatable tfoot {
            display: table-header-group !important;
        }
    </style>
    <title>Simple Text Editor</title>
    <style>
        #editor {
            width: 100%;
            height: 300px;
            border: 1px solid #000;
            margin-top: 10px;
            padding: 5px;
            font-family: Arial, sans-serif;
        }
    </style>
     <style>
        .editable {
            padding: 5px;
            outline: 1px solid #ccc;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('layaut.sidebar')

    <main class="main-content border-radius-lg ">

        <div class="container">
            <div class="col-12" aling="center">
                <div class="card mb-3" style="max-width: 1100px; margin:auto; ">
                    <div class="row g-0"
                        style="text-align: center;box-shadow: 14px 8px 6px 0px rgb(60 136 165 / 71%);     border-radius: 15px;">
                        <div class="col-md-12">
                            <div class="card-body">

                                <form method="POST" action="/save-content" id="editor-form">
                                    @csrf <!-- Token CSRF para seguridad en Laravel -->
                                    <input type="hidden" name="content" id="editor-content">
                                    <div id="editor">
                                        <h3 style="color:black" align="center"><strong>AMIGO SECRETO "MES" "AÑO".</strong></h3>
						<br>
						<h4 style="color:black; font-size: 21px;" ; align="justify">  
							    <strong>• INSCRIPCIONES:</strong> 
							<br>
							<br>
							    <strong>• SELECCIONAR EL AMIGO SECRETO:</strong> 
							<br>
							<br>
						    	<strong>• NOTA:</strong> 
							<br>
							<br>
					    		<strong>• ENDULZAR:</strong> 
					    	<br>
							<br>
					    		<strong>• ENTREGA REGALO DE AMIGO SECRETO:</strong>
					    	<br>
							<br>
					    		<strong>• INFORMACIÓN IMPORTANTE:</strong>
					    	<br>
							<br>
					    		• 
					    	<br>
							<br>
							    •  El monto mínimo del regalo es de <strong>$20.000 pesos</strong>
						</h4>
                                    </div>
                                    <button type="submit" class="btn mt-3">Guardar</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });

    document.getElementById('editor-form').addEventListener('submit', function() {
        document.getElementById('editor-content').value = quill.root.innerHTML;
    });
</script>

    <script>
        document.getElementById('save-button').addEventListener('click', function() {
    alert('Botón presionado');
    var content = quill.root.innerHTML; // Obtiene el contenido del editor

    fetch('/save-content', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF para seguridad
        },
        body: JSON.stringify({ content: content })
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
});
    </script>
    </main>

    @include('layaut.footer')
</body>

</html>
