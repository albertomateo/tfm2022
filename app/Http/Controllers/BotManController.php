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

use App\Conversations\Conversacion;



class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */

    public function handle()

    {

        $botman = app('botman');


        $botman->hears('{message}', function ($botman, $message) {
            // $this->iraEressan($botman);
            
            $this->startConversation($botman);
            

/*             if (preg_match("/recibo/i", $message)) {

                // if ($message == 'hi') {
                $this->askPagarRecibos($botman);
            } else {
                // $botman->reply("<h1>hola</h1>");
                // $botman->reply('<h1>pulsa para ir a catastro </h1> <a href="../catastro" target="_blank">Catastro</a>');
                $botman->reply(' <a href="../catastro" target="_top"><h1>pulsa para ir a catastro </h1></a>');
            } */
        });

        $botman->listen();
    }

    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new Conversacion());
    }

}
