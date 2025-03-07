<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot flotante</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Icono flotante del chatbot */
        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #4a90e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .chatbot-icon img {
            width: 30px;
            height: 30px;
        }

        /* Contenedor del chatbot (oculto por defecto) */
        .chatbot-container {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 370px;
            height: 470px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            background: #ffffff;
            display: none;
            flex-direction: column;
        }

        /* Estilos del encabezado del chatbot */
        .chatbot-header {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
        }

        /* Estilos del iframe del chatbot */
        .chatbot-iframe {
            border: none;
            width: 100%;
            height: 100%;
        }

        /* Botón de cierre */
        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 18px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Icono flotante del chatbot -->
    <div class="chatbot-icon" onclick="toggleChatbot()">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/chat.png" alt="Chat Icono">
    </div>

    <!-- Contenedor del chatbot -->
    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            Asistente Virtual
            <span class="close-btn" onclick="toggleChatbot()">×</span>
        </div>
        
        <iframe
            class="chatbot-iframe"
            allow="microphone;"
            src="https://console.dialogflow.com/api-client/demo/embedded/d0eb13bd-0f4c-46cf-bdc4-87f0ba824d35">
        </iframe>
    </div>

    <script>
        // Función para mostrar y ocultar el chatbot
        function toggleChatbot() {
            const chatbotContainer = document.getElementById("chatbotContainer");
            chatbotContainer.style.display = chatbotContainer.style.display === "none" || chatbotContainer.style.display === "" ? "flex" : "none";
        }
    </script>
    

    <!-- /////////////////////CHATGPT -->
</body>
</html>
