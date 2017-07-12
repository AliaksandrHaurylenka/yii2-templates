<?php
/**
 * файл function.php используется для подключения пользовательских функций
 * доступ к файлу в проекте подключается:
 * frontend->web->index.php и перед последней строкой вставить require(__DIR__ . '/../functions.php');
 */

function debug($arr)
{//вывод на печать при отладке
  echo '<pre>' . print_r($arr, true) . '</pre>';
}


/**
 * функция увеличивающая изображения на странице с выводом по ценру
 * используется на главной для увеличения сертификатов
 */
function fancybox($group)
{
  echo newerton\fancybox\FancyBox::widget([
    'target' => "a[data-fancybox-group=$group]",
    'helpers' => true,
    'mouse' => true,
    'config' => [
      'maxWidth' => '100%',
      'maxHeight' => '100%',
      'playSpeed' => 3000,
      //'padding' => 0,//для бордюра вокруг фото
      'fitToView' => false,
      'width' => '100%',
      'height' => '100%',
      'autoSize' => false,
      'closeClick' => false,
      'openEffect' => 'elastic',
      'closeEffect' => 'elastic',
      'prevEffect' => 'elastic',
      'nextEffect' => 'elastic',
      'closeBtn' => false,
      'openOpacity' => true,
      //'title' => "$(this.element).find('img').attr('alt')",
      'helpers' => [
        'title' => ['type' => 'float'],//позиция подписи // 'float', 'inside', 'outside' or 'over'
        //'buttons' => [],//кнопки навигации, запуск сладера
        //'thumbs' => ['width' => 68, 'height' => 50],//миниатюры
        'overlay' => [
          'css' => [
            'background' => 'rgba(0, 0, 0, 0.8)'
          ]
        ]
      ],
    ]
  ]);

//echo Html::a(Html::img('/folder/thumb.jpg'), '/folder/imagem.jpg', ['data-fancybox-group' => 'fancybox']);


}

