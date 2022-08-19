@extends('layouts.app')

@section('content')
<div class="container">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Botman Chatbot in Laravel - Real Programmer</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>

    <body>
    </body>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script type="application/javascript">
        var botmanWidget = {
            title: 'Chatbot de Tributos de Sanlucar',
            aboutText: 'Write Something',
            mainColor: '#c02026',
            aboutText: '',
            bubbleBackground: '#c02026',
            desktopHeight: 900,
            desktopWidth: 540,
            headerTextColor: '#fff',
            introMessage: "✋ Hola. Soy un Asistente Virtual. Voy a tratar de ayudarte. Escriba lo que necesita"
        };
    </script>



    <script type="application/javascript" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'>

    </script>
<th>
    <p>.</p>
    <td>
        <a href="#" class="btn" onclick="botmanChatWidget.open();return false;">ABRIR CHAT DE AYUDA</a>
    </td>
    <!-- <script type="application/javascript">
        function abreelchat() {
            botmanChatWidget.open();
        }
        abreelchat();
    </script> -->



</div>

@endsection