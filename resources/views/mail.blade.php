<DOCTYPE html>
 <html lang=”en-US”>
 <head>
 <meta charset=”utf-8">
 </head>
 <body>
 <div class="mail" style="background: #cee7fd;
        padding: 10px;
        border-radius: 5px;">
    <div style="display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;" class="line">
        <div style=" margin-right: 10px;
        color: #8c8c8c;" class="line-key">Имя</div>
        <div style=" color: black;
        font-size: 20px;" class="line-value">{{ $name }}</div>
    </div>
    <div style="display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;" class="line">
        <div style=" margin-right: 10px;
        color: #8c8c8c;" class="line-key">Email</div>
        <div style=" color: black;
        font-size: 20px;" class="line-value">{{ $email }}</div>
    </div>
    <div style="display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;" class="line">
        <div style=" margin-right: 10px;
        color: #8c8c8c;" class="line-key">Тема</div>
        <div style=" color: black;
        font-size: 20px;" class="line-value">{{ $theme }}</div>
    </div>
    <div style="display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;" class="line">
        <div style=" margin-right: 10px;
        color: #8c8c8c;" class="line-key">Сообщение</div>
        <div style=" color: black;
        font-size: 20px;" class="line-value">{{ $mess }}</div>
    </div>
    <div style="display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;" class="line">
        <div style=" margin-right: 10px;
        color: #8c8c8c;" class="line-key">Дата</div>
        <div style=" color: black;
        font-size: 20px;" class="line-value">{{ $date }}</div>
    </div>
</div>
</body>
</html>
