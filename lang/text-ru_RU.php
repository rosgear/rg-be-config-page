<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * Пакет русской локализации.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

return [
    '{name}'        => 'Информация о сайте',
    '{description}' => 'Изменение шаблона заголовка, ключевых слов, описания, разметки страниц',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Изменение информации о сайте']
    ],

    // Form: поля
    'Used if there are no other localizations' => 'Используется, если нет другой локализации',
    'Title pattern' => 'Шаблон заголовка',
    'the title of the article or page is substituted into the template' => 'в шаблон подставляется заголовок статьи или страницы',
    'Default' => 'По умолчанию',
    'Title' => 'Заголовок',
    'defines the title of the document that is displayed in the browser window title or page tab'
        => 'определяет заголовок документа, который отображается в заголовке окна браузера или на вкладке страницы',
    'Author' => 'Автор',
    'authors name (if not specified, will be substituted from the article)' 
        => 'имя автора (если не указано, будет подставлено из статьи)',
    'Keywords' => 'Ключевые слова',
    'search engines are used to determine the relevance of a link' 
        => 'поисковые системы используют для того, чтобы определить релевантность ссылки. Необходимо использовать только те слова, которые содержатся на самой странице, количество слов — не более десяти',
    'Description' => 'Описание',
    'used by search engines for indexing, as well as when creating annotations in the search results' 
        => 'используется поисковыми системами для индексации, а также при создании аннотации в выдаче по запросу. При отсутствии тега поисковые системы выдают в аннотации первую строку документа или отрывок, содержащий ключевые слова',
    'Image' => 'Изображение',
    'logo, image used in social media posts' => 'логотип, изображение используемое в публикациях соцсетей',
    'Indexing' => 'Индексирование',
    'indexing of the site in search engines by robots' => 'индексирование сайта в поисковых системах роботами',
    'The above parameters, such as: "Author", "Image", "Indexing" will be applied to the pages and articles of the site in which they are absent'
        => 'Указанные выше параметры, такие как: "Автор", "Изображение", "Индексирование" будут применяться к страницам и статьям сайта в которых они отсутствую с учетом языка',
    'Website micromarking for search engines' => 'Микроразметка сайта для поисковых систем',
    'Open Graph markup' => 'Open Graph',
    'Twitter Card markup' => 'Twitter Card',
    'Schema.org markup' => 'Schema.org',
    'VK markup' => 'ВКонтакте',
    'Application signature' => 'Подпись приложения',
    'in HTML page' => 'в HTML странице',
    'meta tag "GENERATOR"' => 'метатег "GENERATOR"',
    'Signature:' => 'Подпись:',
    'in the HTTP header' => 'в HTTP-заголовке ',
    'parameter' => 'параметр',
    'sign as' => 'подписать как',
    'reset settings' => 'сбросить настройки',
    // Form: сообщения / заголовки
    'Save settings' => 'Сохранение настроек',
    'Reset settings' => 'Сброс настроек',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'успешное сохранение настроек "<b>{0}</b>"',
    'settings reseted {0} successfully' => 'успешный сброс настроек "<b>{0}</b>"'
];
