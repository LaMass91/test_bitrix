<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задайте вопрос");
?><p>
 <b>Телефон:</b>&nbsp;8 999 99 99<br>
 <b>Адрес:</b> г. Тамбов, ул. Советская, 191Е
</p>
<div class="mb-2 embed-responsive embed-responsive-16by9">
	 <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A1a32bc232460535c4deac9d28309abec92c5923650cedc7c70a373f6fdb2a7cc&amp;source=constructor" width="100%" height="590" frameborder="0"></iframe>
</div>
<div class="mb-4">
 <small><a href="https://maps.google.ru/maps?f=q&source=embed&hl=ru&geocode=&q=%D0%B3.+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D1%83%D0%BB.+2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F,+%D0%B4.+38%D0%90&aq=&sll=55,103&sspn=90.84699,270.527344&t=m&ie=UTF8&hq=&hnear=2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+38,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127287&ll=55.805478,37.569551&spn=0.023154,0.054932&z=14&iwloc=A" style="text-align:left">Просмотреть увеличенную карту</a></small>
</div>
<h2>Задать вопрос</h2>
	<?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"bootstrap_v4",
	Array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"EMAIL_TO" => "sale@nyuta.bx",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(0=>"NAME",),
		"USE_CAPTCHA" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>