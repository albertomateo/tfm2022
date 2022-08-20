<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Cache\DoctrineCache;
use Doctrine\Common\Cache\FilesystemCache;
use Illuminate\Foundation\Inspiring;



class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()

    {


        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $this->iraEressan();

            if (preg_match("/recibo/i", $message)) {

                // if ($message == 'hi') {
                $this->askPagarRecibos($botman);
            } else {
                // $botman->reply("<h1>hola</h1>");
                // $botman->reply('<h1>pulsa para ir a catastro </h1> <a href="../catastro" target="_blank">Catastro</a>');
                $botman->reply(' <a href="../catastro" target="_top"><h1>pulsa para ir a catastro </h1></a>');
            }
        });

        $botman->listen();
    }

            // ACCIONES MAS FRECUENTES

            public function iraEressan(){
                $$this->reply(' <a href="../eressan" target="_top"><h1>pulsa para ir a Recaudacion Voluntaria de Liquidaciones</h1></a>');   
            }

    public function askPagarRecibos($botman)

    {

        $botman->ask('¿Quieres pagar tus recibos como cada año?', function ($answer) {

            if (preg_match("/si/i", $answer->getText())) {
                $this->askWhatToDo();
                $this->say('Encantado de haberte ayudado');
            } else {
                $this->say('Siento no poder ayudarte');
            }
        });
    }
/* 
    public function askWhatToDo()
    {
        //Se programa una pregunta donde se establacen dos respuestas por defecto y un fallback por si no es ninguna de las dos
        $question =  Question::create('¿Qué deseas hacer en mi blog?')
            ->fallback('Lo siento pero...')
            ->callbackId('que_quieres_hacer')
            ->addButtons([Button::create('¿Ver todos los posts?')->value('all'), Button::create('¿Ver todas las categorías?')->value('categorias'),]);
        $this->ask($question, function (Answer $answer) {

            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                $text = $answer->getText();
                $this->say('Opcion, ' . $value . ' ' . $text);
            }
        });
    } */



    
}
