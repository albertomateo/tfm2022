@extends('layouts.app')

@section('content')



    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Botman Chatbot in Laravel - Real Programmer</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    </head>
    <body>
        <hr>
        <hr>
       <hr>
    <h1>CHATBOT</h1>


<ul class="navorg" style="top:9em">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 1 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 2 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 3</a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 4 </a></li>

</ul>
<hr>
<hr>
<!-- <p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p> -->

<div id="cuerpo" class="container-fluid"  >

<a href="#" class="btn" onclick="botmanChatWidget.open();return false;">ABRIR CHAT DE AYUDA</a>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script type="application/javascript">
        var botmanWidget = {
            title: 'Chatbot de Tributos de Sanlucar',
            aboutText: 'Write Something',
            mainColor: '#c02026',
            aboutText: '',
            bubbleBackground: '#c02026',
            desktopHeight: 800,
            desktopWidth: 440,
            headerTextColor: '#fff',
            introMessage: "✋ Hola. Soy un Asistente Virtual. Voy a tratar de ayudarte. Escriba lo que necesita"
        };
    </script>



    <script type="application/javascript" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'>

    </script>





    

</div>
</body>
</div>

@endsection