$( function () {
    // =========================================
    // 変数宣言
    // =========================================
    const $modal = $( '#js-comment__modal' );

    // =========================================
    // 関数定義
    // =========================================

    //クリックイベント発生時に、DOMを処理対象の特定
    function setPreviewDom( option ) {
        const $result = option.parents( '.js-comment__item' ).find( '.js-comment__preview' );
        return $result;
    }
    function setEditAreaDom( option ) {
        const $result = option.parents( '.js-comment__item' ).find( '.js-comment__editArea' );
        return $result;
    }
    function setActionDom( option ) {
        const $result = option.parents( '.js-comment__item' ).find( '.js-comment__action' );
        return $result;
    }
    function setOrverlayDom( option ) {
        const $result = option.parents( '.js-comment__item' ).find( '.js-comment__action__overlay' );
        return $result;
    }

    //アクションの表示
    function actionOpen( option ) {
        const $target = option.target;
        const $action = setActionDom( $target );
        const $overlay = setOrverlayDom( $target );

        $action.show();
        $overlay.show();
    }

    //アクションを非表示
    function actionClose( option ) {
        const $target = option.target;
        const $action = setActionDom( $target );
        const $overlay = setOrverlayDom( $target );

        $action.hide();
        $overlay.hide();
    }

    // =========================================
    // controller
    // =========================================

    //クリックイベントまとめ
    $( document )
        //アクションの編集ボタンクリック
        .on( 'click', '.js-comment__editBtn', function () {
            const $target = $( this );
            const $preview = setPreviewDom( $target );
            const $editArea = setEditAreaDom( $target );

            $preview.hide();
            $editArea.show();
        } )
        //編集時にキャンセルボタンを押したとき
        .on( 'click', '.js-comment__canselBtn', function () {
            const $target = $( this );
            const $preview = setPreviewDom( $target );
            const $editArea = setEditAreaDom( $target );

            $preview.show();
            $editArea.hide();
        } )
        //３点リーダークリックでアクション表示
        .on( 'click', '.js-comment__icon', function () {
            const option = {
                target: $( this ),
            };

            actionOpen( option );
        } )
        //アクションの編集・削除いずれかもしくは枠外をクリックしたとき
        .on( 'click', '.js-comment__action,.js-comment__action__overlay', function () {
            const option = {
                target: $( this ),
            };

            actionClose( option );
        } )
        //アクションの削除を押したとき
        .on( 'click', '.js-comment__deleteBtn', function ( e ) {
            const $target = $( this );
            const option = {
                target: $( this ),
            };
            $form = $target.parents( 'form' );

            e.stopPropagation();
            e.preventDefault();
            $modal.show();

            //モーダルの削除ボタンを押すとイベント再開
            $( document )
                .on( 'click', '#js-comment__modal__delete', function () {
                    $form.submit();
                } )
                //モーダルのキャンセルボタンもしくは枠外をクリック時
                .on( 'click', '.js-comment__modal__close', function () {
                    $modal.hide();
                    actionClose( option );
                } )
        } )
} );
