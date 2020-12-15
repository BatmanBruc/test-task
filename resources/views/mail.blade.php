<div class="mail">
    <div class="line">
        <div class="line-key">Имя</div>
        <div class="line-value">{{ $name }}</div>
    </div>
    <div class="line">
        <div class="line-key">Email</div>
        <div class="line-value">{{ $email }}</div>
    </div>
    <div class="line">
        <div class="line-key">Тема</div>
        <div class="line-value">{{ $theme }}</div>
    </div>
    <div class="line">
        <div class="line-key">Сообщение</div>
        <div class="line-value">{{ $mess }}</div>
    </div>
    <div class="line">
        <div class="line-key">Файл</div>
        <div class="line-value"><a href="http://127.0.0.1/uploads/{{ $file }}">Ссылка на файл</a></div>
    </div>
    <div class="line">
        <div class="line-key">Дата</div>
        <div class="line-value">{{ $date }}</div>
    </div>
</div>
<style>
    .mail {
        background: #cee7fd;
        padding: 10px;
        border-radius: 5px;
    }
    .line {
        display: flex;
        padding: 10px;
        background: #b2cee6;
        border-radius: 5px;
        line-height: 43px;
    }
    .line-key {
        margin-right: 10px;
        color: #8c8c8c;
    }
    .line-value {
        color: black;
        font-size: 20px;
    }
</style>