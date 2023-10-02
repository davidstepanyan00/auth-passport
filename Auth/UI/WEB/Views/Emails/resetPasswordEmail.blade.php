<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Document</title>
</head>

<body style="margin: 0">
<div align="center" style="display: table; min-width: 100%; background: #F5F5F5; height: 100vh;">
    <div style="display: table-cell; vertical-align: middle;">
        <div style="display: inline-block">
            <table style="
          max-width: 554px;
          border-radius: 12px;
          border-collapse: separate;
          border-spacing: 0;
          overflow: hidden;
          ">
                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: separate; border-spacing: 0">
                            <tr>
                                <div style="
                                background: #FFF;
                    padding: 24px 32px;
                    border-radius: 12px;
                    height: 56px;
                    width: 536px;
                    font-size: 24px;
                    ">
                                    <img src="{{config('imgUrls.main_icon_mail')}}"
                                         style="width: 120px; height: 35px; padding: 12px 0;" />
                                </div>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="height: 12px;"><td></td></tr>
                <tr>
                    <td>
                        <table style="
                        padding: 32px;
                        height: 100%;
                        border-collapse: separate;
                        border-spacing: 0;
                        background: #FFF;
                        border-radius: 12px;
                        ">
                            <tr>
                                <td style="
                    src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                    font-family: 'Inter', sans-serif;
                    font-style: normal;
                    font-size: 24px;
                    padding: 0;
                    font-weight: 700;
                    line-height: 130%;
                    color: #37352F;
                    letter-spacing: 1px;
                  ">
                                    <span style="padding: 0px 5px 0px 0px;" ><img src="{{config('imgUrls.lock_icon')}}"  alt="icon" width="24px" height="24px"></span>Сброс пароля аккаунта
                                </td>
                            </tr>
                            <tr>
                                <td style="
                    color: #353637;
                    src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                    font-family: 'Inter', sans-serif;
                    font-size: 16px;
                    font-style: normal;
                    line-height: 150%;
                    font-style: normal;
                    font-weight: 400;
                    color: #37352F;
                    padding: 32px 0 24px;
                    ">
                                    Вы запросили сброс пароля в Brovisor.
                                </td>
                            </tr>
                            <tr style="height: 12px;"><td></td></tr>
                            <tr>
                                <td style="
                        src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                        font-family: 'Inter', sans-serif;
                        color: #353637;
                        text-align: center;
                        font-size: 20px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: 130%;
                        color: #37352F;
                        padding: 20px 0px;
                        border-radius: 12px;
                        border: 1px solid #EEEFF0;
                        height: 48px">
                                        <span style="
                                        display: block;
                                        margin: 0;
                                        color: #919799;
                                        src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                                        font-family: 'Inter', sans-serif;
                                        font-size: 16px;
                                        font-style: normal;
                                        font-weight: 400;
                                        line-height: 130%
                                        ">
                                            Временный пароль
                                        </span>
                                    {{$content->code}}
                                </td>
                            <tr>
                            </tr>
                            <tr>
                                <td style="
                  src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                  font-family: 'Inter', sans-serif;
                  height: 48px;
                  font-style: normal;
                  font-weight: 400;
                  font-size: 16px;
                  line-height: 24px;
                  color: #37352F;
                  padding: 24px 0px">
                                    Введите его на странице авторизации. Данный пароль будет действителен в течение 24 часов.
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    <a href="{{$content->url}}" target="_blank" style="
                    display: inline-block;
                    background: #39B2E5;
                    border: 1px solid #39B2E5;
                    border-radius: 4px;
                    text-decoration: none;
                    cursor: pointer;
                    padding: 10px 24px;
                    ">
                                            <span style="
                        margin: 0;
                        src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                        font-family: 'Inter', sans-serif;
                        font-style: normal;
                        font-weight: 400;
                        font-size: 16px;
                        line-height: 24px;
                        color: #FFFFFF;
                      ">
                                                Войти в аккаунт
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="
                  src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                  font-family: 'Inter', sans-serif;
                  height: 48px;
                  font-style: normal;
                  font-weight: 400;
                  font-size: 16px;
                  line-height: 24px;
                  color: #37352F;
                  padding: 24px 0px">
                                    Если вы не запрашивали сброс пароля, сообщите нам об этом <a href="mailto:admin@brovisor.app" target="_blank">admin@brovisor.app</a>.
                                    <br />
                                    <br />
                                    Мы позаботимся о безопасности вашего аккаунта.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: separate; border-spacing: 0; padding-top: 32px;">
                            <tr>
                                <td style="
                                color:#919799;
                                src: url(https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap);
                                font-family: 'Inter', sans-serif;
                                font-size: 12px;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 150%;
                                max-width: 600px;
                                ">
                                    © 2023 Brovisor Antidetect <br/> Все права защищены.
                                </td>
                                <td style="width: 32px; height: 32px; ">
                                    <a href="https://t.me/brovisor">
                                        <img src="{{config('imgUrls.telegram_icon_mail')}}" alt="telegram" />
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

</html>
