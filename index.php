
<!-- saved from url=(0016)http://woen.loc/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>МЕХАНИЗМЫ ВОЙНЫ - здесь можно узнать все о войне и о том что сней связано...</title>
	
    <link href="../css/all.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<link rel="stylesheet" href="../css/style.css">
    <meta content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
</head>


<body>

<div class="id_body">
	<header>
		<p class="slogan">Имя твое - неизвестно,<br>
 Подвиг твой - бессмертен!</p>
		<div class="toggle-button" onclick="myFunction(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
 		<div class="wrapper">
			 <div>
				<a href="/"><img src="/css/logo.png"></a>
				<p>сайт посвящен Второй Мировой войне (на данный момент на сайте присутствуют материалы только по
					Великой Отечественной войне)</p>
				<div class="search-wrapper">
					<form method="GET" action="#" accept-charset="UTF-8" class="input-holder">
					<input placeholder="Поиск по статьям" class="search-input" name="query" type="text">
					<button class="search-icon"><span></span></button>
					</form>
				</div>
			</div>

		</div>
	</header>
	<div id="content">
		<div class="wrapper">
			    <aside>
        <ul><li><a href="#">Admin1</a></li><li><a href="#">Admin2</a></li><li><a href="#">George12</a></li><li><a href="#">Георгий12</a></li></ul>
        <p class="slogan">Имя твое - неизвестно,<br>
				Подвиг твой - бессмертен!</p>
    </aside>
    <main id="index">
        <img align="middle" src="/css/sssr2.jpg">
        <div id="center">
			<form action="ajax.php" method="POST" class="from" id="from">
				<p>Уважаемый посетититель!<br>
			<br>
			Введите свои контактные данные<br></p>
				<p><label>ФИО <em>*</em></label><input type="text" name="name" data-required-form="true"></p>
    			<p><label>Город <em>*</em></label><input type="text" name="city" data-required-form="true"></p>
    			<p><label>Адрес <em>*</em></label><input type="text" name="address" data-required-form="true"></p>
    			<p><label>Телефон <em>*</em></label><input type="tel" name="phone" data-required-form="true"></p>
    			<p><label>E-mail <em>*</em></label><input type="email" name="email" data-required-form="true"></p>
				<button type="submit" id="btnForm">Отправить</button>
			</form>
			<p id="response"></p>
		</div>
        
    </main>
		</div>
	</div>

	<footer>
		<div class="wrapper">
			<div>
				<a href="mailto:piun_pv@mail.ru">Copyright © 2009</a>
				<p>При перепечатывании материалов сайта активная ссылка на сайт обязательна!</p>
			</div>
		</div>
	</footer>
</div>
<script>
	function myFunction(x) {
		x.classList.toggle("change");
		document.querySelector("aside").classList.toggle("nav-mobile");
	}
</script>
<script>
$(document).ready(function() {
    $("#btnForm").click(function(){
        var faults = $('input').filter(function() {
            // находим не заполненные обязательные элементы input
        return $(this).data('required-form') && $(this).val() === "";
        }).css("background-color", "red"); // выделяем это поле красным

        if(faults.length) return false; // если одно из полей не заполнено, отменяем отправку
        sendAjaxForm('from', 'ajax.php');
        //Console.log('result_form');
        return false; 
    });
});
function sendAjaxForm(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        //dataType: "html", //формат данных
        data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            //myPopbox.open('modal2');
			$("#response").text(response);
            console.log(response);
        },
        error: function(response) { // Данные не отправлены
            //myPopbox.open('modal3');
			$("#response").text(response);
			console.log(response);
        }
    });
}
</script>
</body><div></div></html>