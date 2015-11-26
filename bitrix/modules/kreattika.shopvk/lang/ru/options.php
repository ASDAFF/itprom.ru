<?
######################################################
# Name: kreattika.shopvk                             #
# (c) 2011-2014 Kreattika, Sedov S.Y.                #
# Dual licensed under the MIT and GPL                #
# http://kreattika.ru/                               #
# mailto:info@kreattika.ru                           #
######################################################
?>
<?
$MESS['KREATTIKA_AGENSY'] = "Магазин готовых решений для 1С-Битрикс";
$MESS['KREATTIKA_SVK_DESCR'] = 'Модуль позволяет автоматически размещать записи на страницах, создавать альбомы и др. возможности социальных сетей.<br /><br />
Разместить запись в группе можно так:<br />
if(CModule::IncludeModule("kreattika.shopvk"))<br />
{<br />
$ShopVK->wall_post("text", "", "");<br />
}<br />
';

$MESS['KREATTIKA_SVK_ON'] = "Активировать модуль магазин ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_OPT_TITLE'] = "Нстройки автопостинга ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_DELETE_POST'] = "Удалять пост, при удалении товара";
$MESS['KREATTIKA_SHOP_VK_EVENT_LOG'] = "Создавать запись в журнале событий";
$MESS['KREATTIKA_SHOP_VK_ACTIVE_AUTO_POST'] = "Публиковать только активные элементы";
$MESS['KREATTIKA_SHOP_VK_ON'] = "Включить автопостинг ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_IB'] = "Инфолоки для автопостинга:";
$MESS['KREATTIKA_SHOP_VK_IB_FIELDS'] = "Поля инфолока для автопостинга:";
$MESS['KREATTIKA_SHOP_VK_IB_PROPERTIES'] = "Свойства инфоблока для автопостинга:";
$MESS['KREATTIKA_SHOP_VK_IB_PRICES'] = "Типы цен для автопостинга:";
$MESS['KREATTIKA_SHOP_VK_FIELD_NAME_TITLE'] = "Наименование";
$MESS['KREATTIKA_SHOP_VK_LINK_TITLE'] = "Ссылка";
$MESS['KREATTIKA_SHOP_VK_FIELD_PREVIEW_OR_DETAIL_PICTURE_TITLE'] = "Картинка анонса или детальная картинка";
$MESS['KREATTIKA_SHOP_VK_FIELD_PREVIEW_OR_DETAIL_TEXT_TITLE'] = "Краткое или полное описание";
$MESS['KREATTIKA_SHOP_VK_FIELD_PREVIEW_PICTURE_TITLE'] = "Картинка анонса";
$MESS['KREATTIKA_SHOP_VK_FIELD_PREVIEW_TEXT_TITLE'] = "Краткое описание";
$MESS['KREATTIKA_SHOP_VK_FIELD_DETAIL_PICTURE_TITLE'] = "Детальная картинка";
$MESS['KREATTIKA_SHOP_VK_FIELD_DETAIL_TEXT_TITLE'] = "Полное описание";
$MESS['KREATTIKA_SHOP_VK_TPL'] = "Шаблон поста:";
$MESS['KREATTIKA_SHOP_VK_ALBUM_TITLE'] = "Нстройки синхронизации альбомов ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_ALBUM_DELETE_ALBUM'] = "Удалять альбом, при удолении раздела";
$MESS['KREATTIKA_SHOP_VK_ALBUM_DELETE_PHOTO'] = "Удалять фото, при удалении товара";
$MESS['KREATTIKA_SHOP_VK_ALBUM_EVENT_LOG'] = "Создавать запись в журнале событий";
$MESS['KREATTIKA_SHOP_VK_ALBUM_ACTIVE_AUTO_POST'] = "Публиковать только активные элементы";
$MESS['KREATTIKA_SHOP_VK_ALBUM_ON'] = "Включить синхронизацию альбомов ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_ALBUM_IB'] = "Инфолоки для альбомов:";
$MESS['KREATTIKA_SHOP_VK_ALBUM_IB_FIELDS'] = "Поля инфолока для альбомов:";
$MESS['KREATTIKA_SHOP_VK_ALBUM_IB_PROPERTIES'] = "Свойства инфоблока для альбомов:";
$MESS['KREATTIKA_SHOP_VK_ALBUM_IB_PRICES'] = "Типы цен для альбомов:";
$MESS['KREATTIKA_SHOP_VK_ALBUM_TPL'] = "Шаблон подписи:";
$MESS['KREATTIKA_SHOP_VK_GROUP_TITLE'] = "Нстройки доступа ВКонтакте";
$MESS['KREATTIKA_SHOP_VK_IS_GROUP'] = "Это группа";
$MESS['KREATTIKA_SHOP_VK_POST_FROM_USER'] = "Писать от имени пользователя";
$MESS['KREATTIKA_SHOP_VK_TOKEN'] = "ВКонтакте Token:";
$MESS['KREATTIKA_SHOP_VK_APP_ID'] = "ВКонтакте App ID ( id приложения ):";
$MESS['KREATTIKA_SHOP_VK_OWNER_ID'] = "ВКонтакте Owner ID ( id группы или id страницы ):";
$MESS['KREATTIKA_SHOP_VK_NOTE'] = '<b>Пошаговая инструкция настроки ВКонтакте</b><br />
1. Укажите инфоблоки при создании элементов которых нужно постить. Чтобы выделить несколько инфоблоков, нажмите и удерживайте Ctrl и мышкой выбирайте нужные инфоблоки.<br />
2. Укажите поля, которые необходимо постить в сообщении. Чтобы выделить несколько полей, нажмите и удерживайте Ctrl и мышкой выбирайте нужные поля.<br />
3. Укажите шаблон сообщения используя ключевые слова замены (идентификаторы указанных полей). Если поле не указано для постинга, замена ключевого слова производиться не будет!<br />
4. Авторизуйтесь ВКонтакте<br />
5. создайте Standalone приложение тут: <a href="http://vk.com/dev" target="_blank">http://vk.com/dev</a><br />
6. укажите в поле "ВКонтакте App ID" id созданного вами Standalone приложения<br />
7. сохраните настройки модуля (нажмите на кнопочку "Сохранить" ниже)<br />
8. пройдите по ссылке <a  target="_blank" href="https://oauth.vk.com/authorize?client_id=#APPID#&scope=offline,group,photos,wall&display=page&response_type=token&redirect_uri=https://oauth.vk.com/blank.html">получить token</a><br />
9. откроется новое окно, разрешите доступ приложению, после того как откроется другая страница в адресной строке скопируйте значение GET параметра "access_token" и вставите в поле "ВКонтакте Token" ( будьте внимательны! важно не пропустить ни один символ и не указать лишние)<br />
10. укажите в поле "ВКонтакте Owner ID" номер вашей группы.<br />
11. включите галочки "Активировать модуль автопостинга" и "Включить автопостинг ВКонтакте"<br />
12. сохраниете настройки модуля (нажмите на кнопочку "Сохранить" ниже)<br />
Если вы все сделали правильно, настройка модуля закончена!
';
$MESS['KREATTIKA_SHOP_VK_LIB_NOTE'] = '<b style="color: red;">Внимание! На сервере не установлены необходимые для работы модуля PHP библиотеки:</b><br />
#LIB_NAME#<br />
';
?>
