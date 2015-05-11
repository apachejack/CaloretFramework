<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
        <style type="text/css">
            #modal_content{
              background-color: #fff;
              border-radius: 10px 10px 10px 10px;
              box-shadow: 0 0 25px 5px #999;
              color: #111;
              display: none;
              min-width: 450px;
              padding: 25px;
            }

            img#rita{
              max-width:500px;
            }
        </style>
    </head>

    <body>
      <div class="container-fluid">
        <div class="jumbotron">
          <h1>Caloret Framework</h1>
          <p>Ni el fred del invierno parará esta ola de frameworks PHP</p>
          <p>
            <ul>
              <li>MVC</li>
              <li>Tus controladores heredan de CaloretController para facilitarte la vida.</li>
              <li>Sistema de plantillas CaloretTemplating</li>
              <li>CaloretResponse para gestionar las respuestas HTTP y su contenido</li>
              <li>Generador SQL</li>
              <li>Y mucho más...</li>
            </ul>
          </p>
        </div>

        <button class="btn btn-default" execute="helloController_getMsg">Hola</button>
          <hr>
        <a class="btn btn-default" href="?c=CarsController&m=bmwSearchAction">Cars</a>

      </div> 
        <script src="assets/js/require.js" data-main="caloretJs/boot"></script>
    </body>
</html>