$(function () {
// =========================================
// 変数宣言
// =========================================
    const $modal = $('#js-article__modal');
    const $action 
    = $('.js-article__action');
    const $preview = $('.js-article__preview');
    const $editArea = $('.js-article__editArea');
    const $overlay = $('.js-article__action__overlay');
    const $form = $('#js-action__form');

// =========================================
// 関数定義
// =========================================

//アクションの表示
function actionOpen(option) {
   $action.css('visibility','visible');
   $action.css('opacity',1);
   $overlay.css('visibility','visible');
   $overlay.css('opacity',1);
}
    
//アクションを非表示
function actionClose(option) {
    $action.css('visibility','hidden');
    $action.css('opacity',0);
    $overlay.css('visibility','hidden');
    $overlay.css('opacity',0);
}

// =========================================
// controller
// =========================================
    
//クリックイベントまとめ
$(document)
//アクションの編集ボタンクリック
// .on('click', '.js-article__editBtn', function () {
//     $preview.hide();
//     $editArea.show();
// })
//編集時にキャンセルボタンを押したとき
.on('click', '.js-article__canselBtn', function () {
    $preview.show();
    $editArea.hide();
})
//３点リーダークリックでアクション表示
.on('click', '.js-article__icon', function () {
    actionOpen();
})
//アクションの編集・削除いずれかもしくは枠外をクリックしたとき
.on('click', '.js-article__action,.js-article__action__overlay', function () {
    actionClose();
})
//アクションの削除を押したとき
    .on('click', '.js-article__deleteBtn', function (e) {
    console.log('clickされた');
    e.stopPropagation();
    e.preventDefault();
    $modal.show();
    
    //モーダルの削除ボタンを押すとイベント再開
    $(document)
        .on('click', '#js-article__modal__delete', function () {
            $form.submit();
        })
    //モーダルのキャンセルボタンもしくは枠外をクリック時
        .on('click', '.js-article__modal__close', function () {
            $modal.hide();
            actionClose();
        })
})
});