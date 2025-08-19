<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe - My Event</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #1E3A8A 0%, #06B6D4 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header img {
            height: 50px;
            margin-bottom: 15px;
        }
        .content {
            padding: 40px 30px;
        }
        .btn {
            display: inline-block;
            background: #1E3A8A;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 20px 0;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background: #06B6D4;
            transform: translateY(-2px);
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🔑 Réinitialisation de mot de passe</h1>
            <p>My Event - Votre plateforme d'événements</p>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Bonjour,</h2>
            
            <p>Vous avez demandé la réinitialisation de votre mot de passe pour votre compte My Event.</p>
            
            <p>Cliquez sur le bouton ci-dessous pour créer un nouveau mot de passe :</p>
            
            <div style="text-align: center;">
                <a href="{{ $url }}" class="btn">
                    🔐 Réinitialiser mon mot de passe
                </a>
            </div>
            
            <div class="warning">
                <strong>⚠️ Important :</strong>
                <ul>
                    <li>Ce lien expire dans <strong>60 minutes</strong></li>
                    <li>Si vous n'avez pas demandé cette réinitialisation, ignorez cet email</li>
                    <li>Ne partagez jamais ce lien avec personne</li>
                </ul>
            </div>
            
            <p>Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :</p>
            <p style="word-break: break-all; background: #f8f9fa; padding: 10px; border-radius: 5px; font-family: monospace;">
                {{ $url }}
            </p>
            
            <p>Merci de votre confiance,<br>
            <strong>L'équipe My Event</strong></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} My Event. Tous droits réservés.</p>
            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        </div>
    </div>
</body>
</html>
