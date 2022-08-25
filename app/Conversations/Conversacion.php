<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Interfaces\StorageInterface;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Redirect;



class Conversacion extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {


        $question = Question::create("Huh - you woke me up. What do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')

            ->addButtons([
                Button::create('Tell a joke')->value('joke'),
                Button::create('Give me a fancy quote')->value('quote'),

            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else {
                    $this->say(Inspiring::quote());
                }
            }
        });
    }


    // REDIRECCIONES - Array que devuelve los Strings para redirigir
    // Hasta el momento no he encontrdo una forma mejor de redirigir a una web interna o externa
    // parametros de entrada Servicio
    // devuelve Strings que en pantalla se ve como un enlace

    public function redirecciones($servicio)
    {
        $this->bot->channelStorage()->save([
            'Servicio al que llega con botones' => $servicio,
        ]);

        //array asociativo
        $enlacedeservicios = array(

            //<a href="mailto:ibi@sanlucardebarrameda.es">Rentas email</a>
            // <a href="tel:+34 956388034">956388034</a>
            "01" => '<a href="../rentas" target="_top"><h1>Enlace a rentas</h1></a>)', // Rentas
            "02" => "ERESSAN",
            "03" => "Catastro",
            "04" => "Diputacion",
            "09" => "Otros",

            "R1" => '<a href="../eressan" target="_top"><h1>Enlace a rentas</h1></a>)',
            "R2" => "Rentas - Recursos",
            "R8" => '<a href="https://citaprevia.sanlucardebarrameda.es" target="_top"><h1>Cita Previa</h1></a>',  // cita previa
            "R9" => '<a href="https://sede.sanlucardebarrameda.es" target="_top"><h1>Registro de Rentas</h1></a>',//Rentas - Registro

            "E1" => "Eressan - Pago de Liquidaciones en Voluntaria ",
            "E2" => "Eressan - Pago de Ayuda en domicilio",
            "E3" => "Eressan - Pago de Alquiler de viviendas",
            "E4" => "Eressan - Fraccionamieento Aplazamientos de liq en voluntaria",
            "E9" => '<a href="https://sede.sanlucardebarrameda.es" target="_top"><h1>Registro de ERESSAN</h1></a>',//ERESSAN - Registro

            "C1" => "Catastro - Declaraciones Catastrales 900D",
            "C2" => "Catastro - Alegaciones o Recursos contra Catastro",
            "C3" => "Catastro - Requerimientos y Audiencias de Catastro",
            "C9" => '<a href="https://www.sedecatastro.gob.es/" target="_top"><h1>Registro de Catastro</h1></a>',//Catastro - Registro

            "D1" => '<a href="https://sprygt.dipucadiz.es/pago-de-tributos" target="_top"><h1>Registro de Catastro</h1></a>',    //"Diputación - Pago de Recibos",
            "D2" => "Diputación - Domiciliaciones de recibos",
            "D3" => "Diputación - Embargos de cuenta corriente",
            "D4" => "Diputación - Recursos",

            "O1" => "Otros - Localizacion",
            "O2" => "Otros - Direccion",
        );
        return  $enlacedeservicios[$servicio];
    }


    // CREA ARRAY DE BOTONES
    // Parametros de entrada: Codigo del servicio
    // Salida: Array de botones que contengan en el tipo o grupo de ellos 
    public function creaarraybotones($tipo)
    {

        //array asociativo
        $servicios = array(
            "01" => "Rentas",
            "02" => "ERESSAN",
            "03" => "Catastro",
            "04" => "Diputacion",
            "09" => "Otros",

            "R1" => "Rentas - Bonificaciones",
            "R2" => "Rentas - Recursos",
            "R8" => "Rentas - Cita Previa",
            "R9" => "Rentas - Registro",

            "E1" => "Eressan - Pago de Liquidaciones en Voluntaria ",
            "E2" => "Eressan - Pago de Ayuda en domicilio",
            "E3" => "Eressan - Pago de Alquiler de viviendas",
            "E4" => "Eressan - Fraccionamiento Aplazamientos de liquidaciones en voluntaria",
            "E9" => "Eressan - Registro",

            "C1" => "Catastro - Declaraciones Catastrales 900D",
            "C2" => "Catastro - Alegaciones o Recursos contra Catastro",
            "C3" => "Catastro - Requerimientos y Audiencias de Catastro",
            "C9" => "Catastro - Registro",

            "D1" => "Diputación - Pago de Recibos",
            "D2" => "Diputación - Domiciliaciones de recibos",
            "D3" => "Diputación - Embargos de cuenta corriente",
            "D4" => "Diputación - Recursos",
            "D9" => "Diputación - Registro",

            "O1" => "Otros - Localizacion",
            "O2" => "Otros - Direccion",
        );


        $buttonArray = [];
        // general

        if ($tipo == "0") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/[0-9]{2}/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }

        if ($tipo == "01") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/^R/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }

        if ($tipo == "02") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/^E/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }

        if ($tipo == "03") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/^C/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }
        if ($tipo == "04") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/^D/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }
        if ($tipo == "09") {
            foreach ($servicios as $id => $value) {

                if (preg_match('/^O/', $id)) {
                    $button = Button::create($value)->value($id);
                    $buttonArray[] = $button;
                }
            }
        }


        return $buttonArray;
    }

    // CREA ARRAY DE BOTONES
    // Parametros de entrada: String 
    // Salida: Array de botones cuya descripcion contenga el string de entrada
    public function creaarraybotonesDescripcion($descripcion)
    {
        // antes de buscar por descripcion adecua el texto introducido
        // ejemplo el usuario dice vengo por un error en .... 
        // como la frase contiene la palabrar "error"
        // deducimos que quiere algo relacionado con "recursos"
        $descripcion=$this->adecuar($descripcion);
        $servicios = array(
            "01" => "Rentas",
            "02" => "ERESSAN",
            "03" => "Catastro",
            "04" => "Diputacion",
            "09" => "Otros",

            "R1" => "Rentas - Bonificaciones",
            "R2" => "Rentas - Recursos",
            "R8" => "Rentas - Cita Previa",
            "R9" => "Rentas - Registro",

            "E1" => "Eressan - Pago de Liquidaciones en Voluntaria ",
            "E2" => "Eressan - Pago de Ayuda en domicilio",
            "E3" => "Eressan - Pago de Alquiler de viviendas",
            "E4" => "Eressan - Fraccionamiento Aplazamientos de liquidaciones en voluntaria",
            "E9" => "Eressan - Registro",

            "C1" => "Catastro - Declaraciones Catastrales 900D",
            "C2" => "Catastro - Alegaciones o Recursos contra Catastro",
            "C3" => "Catastro - Requerimientos y Audiencias de Catastro",
            "C9" => "Catastro - Registro",

            "D1" => "Diputación - Pago de Recibos",
            "D2" => "Diputación - Domiciliaciones de recibos",
            "D3" => "Diputación - Embargos de cuenta corriente",
            "D4" => "Diputación - Recursos",
            "D9" => "Diputación - Registro",

            "O1" => "Otros - Localizacion",
            "O2" => "Otros - Direccion",
        );


        $buttonArray = [];
        // general

        // $this->say('servicios relacionados con la palabra' . $descripcion);
        foreach ($servicios as $id => $value) {
            if (preg_match('/' . $descripcion . '/i', $value)) {
                // if (preg_match('/[0-9]{2}/', $id)) {
                $button = Button::create($value)->value($id);
                $buttonArray[] = $button;
            }
        }

        return $buttonArray;
    }


    // ADECUA LOS TEXTOS
    // Busca alguna correspondencia entre lo que el usuario escribe y lo que creemos necesita
    // Necesario conocer el dominio de la empresa
    // Parametros de entrada: String 
    // Salida: String con nuevo texto mas adecuado
    public function adecuar($frase)
    {
        // nos interesa que se grabe para tener un seguimiento de uso
        $this->bot->channelStorage()->save([
            'frase del usuario' => $frase,
        ]);

        if (preg_match("/error/i", $frase)) { return "recurso";}
        if (preg_match("/ya no es mi/i", $frase)) { return "recurso";}
        if (preg_match("/pago mucho/i", $frase)) { return "catastro";}
        if (preg_match("/recibo/i", $frase)) { return "recibo";}
        if (preg_match("/contribucion/i", $frase)) { return "recibo";}
        if (preg_match("/sello/i", $frase)) { return "recibo";}
        if (preg_match("/pagar/i", $frase)) { return "pago";}
        if (preg_match("/hacienda/i", $frase)) { return "catastro";}
        if (preg_match("/dependencia/i", $frase)) { return "ayuda";}
        if (preg_match("/familia/i", $frase)) { return "bonificacion";}
        if (preg_match("/basura/i", $frase)) { return "rentas";}
        if (preg_match("/ejecutiva/i", $frase)) { return "Diputacion";}

return $frase;
    }


    public function DescripcionNivel($texto_a_buscar)  // nivel para cuando escribe texto
    {
        $buttonArray = $this->creaarraybotonesDescripcion($texto_a_buscar);

        $question = Question::create("Servicios con la palabra: "."$texto_a_buscar")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons($buttonArray);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {

            } else {
                $this->DescripcionNivel($answer->getText());
            }
        });
    }
    public function PrimerNivel()  // nivel 1 pensado para los botones. Pero puede escribir texto y salta a DescripcionNivel
    {
        $buttonArray = $this->creaarraybotones("0"); // se llama a la funcion para crear los botones.
        // Nos devuelve los que comienzan por cero, es decir las 4 entidades + (Otros. codigo 9)

        $question = Question::create("Servicios principales del edificio". " Si lo desea abajo puede escribir alguna palabra a buscar")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons($buttonArray); // Aqui añadimos el array de botones.  Mejora: Boton salir

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {  // si pulsa un boton,  
                $this->SegundoNivel($answer->getValue());  // llamo al segundo nivel y le paso el texto del boton pulsado
            } else {
                $this->DescripcionNivel($answer->getText());  // si escribe texto voy al nivel de textos de entrada
            }
        });
    }

    public function SegundoNivel($respuestaPrimerNivel)  // Recibe la respuesta de pulsar un boton en nivel 1
    // No se implementan mas niveles por no complicar todo al usuario
    {
        $buttonArray = $this->creaarraybotones($respuestaPrimerNivel);
        $question = Question::create("Servicios del organismo: ".$respuestaPrimerNivel )
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons($buttonArray);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->say($this->redirecciones($answer->getValue()));
            } else {
                $this->DescripcionNivel($answer->getText());
            }
        });
    }



    /**
     * Start the conversation
     */
    public function run()
    {
        // $this->askReason();
        $this->PrimerNivel();
        // $this->DescripcionNivel();

    }
}


// desarrollo futuro. Obtener todo lo que se refiera a textos de json o de API
                    // $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    // $joke =  json_decode(file_get_contents('http://localhost:8000/enlaces/5'));

