<div class="main_menu">
    <div class="main_menu_one_col">
        <span class="main_link <? if($_SERVER['REQUEST_URI']=='/'): ?>active<? endif; ?>"><a href="/">Главная страница</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "about")==1): ?>active<? endif; ?>"><a href="/about/">О корпорации</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/first-person")==1): ?>active<? endif; ?>"><a href="/about/first-person/">От первого лица</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/board-directors")==1): ?>active<? endif; ?>"><a href="/about/board-directors/">Совет директоров</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/management")==1): ?>active<? endif; ?>"><a href="/about/management/">Менеджмент</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "about/disclosures")==1): ?>active<? endif; ?>"><a href="/about/disclosures/">Раскрытие информации</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "products")==1): ?>active<? endif; ?>"><a href="/products/">Продукция</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "products")==1 && strpos($_SERVER['REQUEST_URI'], "products/civil")!=1): ?>active<? endif; ?>"><a href="/products/">Военные корабли</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "products/civil")==1): ?>active<? endif; ?>"><a href="/products/civil/">Гражданские суда</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation")==1): ?>active<? endif; ?>"><a href="/innovation/">Инновации</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation")==1 && strpos($_SERVER['REQUEST_URI'], "innovation/technology-platforms")!=1): ?>active<? endif; ?>"><a href="/innovation/">Инновационное развитие</a></span>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "innovation/technology-platforms")==1): ?>active<? endif; ?>"><a href="/innovation/technology-platforms/">Технологические платформы</a></span>
    </div>
    <div class="main_menu_one_col">
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "enterprises")==1): ?>active<? endif; ?>"><a href="/enterprises/">Предприятия холдинга</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "purchases")==1): ?>active<? endif; ?>"><a href="/purchases/">Закупки</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "purchases")==1): ?>active<? endif; ?>"><a href="/purchases/">Документы</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "purchases/procurement-plan")==1): ?>active<? endif; ?>"><a href="/purchases/procurement-plan/">План закупок</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "purchases/purchases-usc")==1): ?>active<? endif; ?>"><a href="/purchases/purchases-usc/">Закупки ОСК</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "purchases/purchases-enterprises-usc")==1): ?>active<? endif; ?>"><a href="/purchases/purchases-enterprises-usc/">Закупки обществ Группы „ОСК“</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center")==1): ?>active<? endif; ?>"><a href="/press-center/">Пресс-центр</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center/news")==1): ?>active<? endif; ?>"><a href="/press-center/news/">Новости</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center/press-releases")==1): ?>active<? endif; ?>"><a href="/press-center/press-releases/">Пресс-релизы</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center/media-corporation")==1): ?>active<? endif; ?>"><a href="/press-center/media-corporation/">СМИ о корпорации</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center/corporate-media")==1): ?>active<? endif; ?>"><a href="/press-center/corporate-media/">Корпоративные СМИ</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "press-center/media-gallery")==1): ?>active<? endif; ?>"><a href="/press-center/media-gallery/">Медиагалерея</a></span><br>
    </div>
    <div class="main_menu_one_col">
<!--        <span class="main_link"><a href="/corporate-housing-policy/">Копроративная жилищная программа</a></span><br>-->
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "personnel-policy")==1): ?>active<? endif; ?>"><a href="/personnel-policy/">Кадровая политика ОСК</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "personnel-policy/applicants")==1): ?>active<? endif; ?>"><a href="/personnel-policy/applicants/">Соискателям</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "personnel-policy/employees")==1): ?>active<? endif; ?>"><a href="/personnel-policy/employees/">Сотрудникам</a></span><br>
        <span class="sub_link <? if(strpos($_SERVER['REQUEST_URI'], "personnel-policy/graduates-students-pupils")==1): ?>active<? endif; ?>"><a href="/personnel-policy/graduates-students-pupils/"> Выпускникам, студентам, школьникам</a></span><br>
        <span class="main_link <? if(strpos($_SERVER['REQUEST_URI'], "contacts")==1): ?>active<? endif; ?>"><a href="/contacts/">Контактная информация</a></span><br>
    </div>
    <div class="clear"></div>
</div>