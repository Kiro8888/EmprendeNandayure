<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $sessionId = session()->getId(); // Usa la sesión del usuario

        // Carga las credenciales de Dialogflow
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('dialogflow-key.json'));

        // Inicia el cliente de sesión de Dialogflow
        $sessionsClient = new SessionsClient();
        $session = $sessionsClient->sessionName(env('DIALOGFLOW_PROJECT_ID'), $sessionId);

        // Configura la entrada de texto
        $textInput = new TextInput();
        $textInput->setText($message);
        $textInput->setLanguageCode('es');

        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        // Enviar consulta a Dialogflow
        $response = $sessionsClient->detectIntent($session, $queryInput);
        $result = $response->getQueryResult();
        $reply = $result->getFulfillmentText();

        $sessionsClient->close();

        return response()->json(['reply' => $reply]);
    }
}
