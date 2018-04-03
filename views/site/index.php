<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table'],
        'showFooter' => true,
        'layout' => "{errors}\n{pager}\n{items}\n{pager}\n{summary}",
        'summary' => '<i>Сейчас вы видите от </i> <b>{begin}</b> до <b>{end}</b> записей (всего: <b style="color: #090">{totalCount}</b>)',
        'headerRowOptions' => [
            'class' => 'headerCustomRow'
        ],
        'footerRowOptions' => [
            'style' => 'color: #888;font-style: italic;'
        ],
        'rowOptions' => function($model, $key, $index){
            return [
                'class' => ($index % 2 == 0) ? 'stripShow' : ''
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'contentOptions' => function($model){
                    return [
                        'class' => (empty($model->title)) ? 'empty-cell' : ''
                    ];
                },
                'footer' => 'Здесь рассказывается о заголовоке книги'
            ],
            [
                'attribute' => 'src',
                'format' => 'image',
                'filter' => false,
                'contentOptions' => function($model){
                    return [
                        'class' => (empty($model->src)) ? 'empty-cell' : ''
                    ];
                },
                'footer' => 'Куда же без картинки?'
            ],
            [
                'attribute' => 'author',
                'filter' => Html::activeCheckboxList($searchModel, 'author',
                    \yii\helpers\ArrayHelper::map(\app\models\Books::find()->all(), 'author', 'author')),
                'contentOptions' => function($model){
                    return [
                        'class' => (empty($model->author)) ? 'empty-cell' : ''
                    ];
                },
                'footer' => 'Самые любимые и уважаемые всеми, авторы данных книг'
            ],
            [
                'attribute' => 'description',
                'content' => function($model){
                    return \yii\helpers\StringHelper::truncateWords($model->description, 10);
                },
                'footer' => 'Полное описание, к каждому произведению, чтобы читатель сразу мог понять о чем книга'
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d/m/Y'],
                'contentOptions' => function($model){
                    return [
                        'class' => (empty($model->created_at)) ? 'empty-cell' : ''
                    ];
                }
            ],
            [
                'attribute' => 'delete',
                'format' => 'raw',
                'filter' => [
                    'Активные',
                    'В корзине'
                ],
                'contentOptions' => [
                    'width' => '150px'
                ],
                'content' => function($model){
                    return ($model->delete == 0) ? '<span style="color:#090" class="glyphicon glyphicon-ok"></span>' :
                        '<span style="color:#c11" class="glyphicon glyphicon-remove"></span>';
                }
            ],
        ],
    ]); ?>
</div>

<style>
    .empty-cell{
        background: #c12e2a;
    }
    .headerCustomRow, .headerCustomRow th, .headerCustomRow a{
        background: #337ab7;
        color: #fff;
    }
    .stripShow{
        background: #e9f1ff
    }
</style>