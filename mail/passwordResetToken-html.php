<?php

use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.5;
            color: #374151;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 4px 24px rgba(0, 0, 0, 0.05);
        }

        .email-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 32px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .email-body {
            padding: 40px;
        }

        .greeting {
            font-size: 16px;
            margin-bottom: 24px;
            color: #4b5563;
        }

        .token-container {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin: 32px 0;
            text-align: center;
            font-family: 'SF Mono', 'Roboto Mono', monospace;
            font-size: 20px;
            font-weight: 600;
            color: #1e40af;
            letter-spacing: 0.5px;
            word-break: break-all;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .instructions {
            margin-bottom: 24px;
            color: #4b5563;
            font-size: 15px;
        }

        .steps {
            margin: 32px 0;
        }

        .steps h3 {
            color: #111827;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .step {
            display: flex;
            margin-bottom: 16px;
            align-items: flex-start;
        }

        .step-number {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 600;
        }

        .step-content {
            flex-grow: 1;
            padding-top: 4px;
            color: #4b5563;
        }

        .email-footer {
            background-color: #f3f4f6;
            padding: 24px;
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }

        .warning {
            background-color: #fef2f2;
            color: #991b1b;
            padding: 16px;
            border-radius: 8px;
            margin: 24px 0;
            font-size: 14px;
            border-left: 4px solid #ef4444;
        }

        .warning strong {
            color: #b91c1c;
        }

        .brand {
            font-weight: 600;
            color: #111827;
        }

        .divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 24px 0;
        }
    </style>
    
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Восстановление пароля</h1>
        </div>

        <div class="email-body">
            <p class="greeting">Здравствуйте, <?= Html::encode($user->username) ?>,</p>

            <div class="instructions">
                <p>Мы получили запрос на восстановление пароля для вашего аккаунта. Для продолжения используйте следующий токен:</p>
            </div>

            <div class="token-container">
                <?= $user->password_reset_token ?>
            </div>

            <div class="warning">
                <p><strong>Важно:</strong> Никому не сообщайте этот токен! Это может привести к несанкционированному доступу к вашему аккаунту.</p>
            </div>

            <div class="steps">
                <h3>Как использовать токен:</h3>

                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        Перейдите на страницу восстановления пароля в нашем приложении
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        Введите полученный токен в соответствующее поле
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        Создайте новый надежный пароль и подтвердите изменения
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <p>Если вы не запрашивали восстановление пароля, пожалуйста, проигнорируйте это письмо или сообщите в нашу службу поддержки.</p>
        </div>

        <div class="email-footer">
            <p>© <?= date('Y') ?> <span class="brand"><?= Yii::$app->name ?></span>. Все права защищены.</p>
            <p>Это письмо отправлено автоматически, пожалуйста, не отвечайте на него.</p>
        </div>
    </div>
</body>

</html>