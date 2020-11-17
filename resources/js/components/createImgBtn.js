//exportしてapp.jsで実行(quillエディターの読み込みが先）
export default function createImgBtnDom() {

    const $insertBtnDom = $(
        '<span id="js-insert__target" class="ql-formats ql-formats--imgInsert">' +
        '<label for="js-upload__img" class="c-ql__imgInsert__label">' +
        '<input type="file" id="js-upload__img" class="c-ql__imgInsert__input">' +
        '<div class="c-imgInsert__img">' +
        '<svg viewBox="0 0 18 18">' +
        '<rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>' +
        '<circle class="ql-fill" cx="6" cy="7" r="1"></circle>' +
        '<polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>' +
        '</svg></div>' +
        '</label>' +
        '</span>' );

    $insertBtnDom.insertAfter( $( '.ql-underline' ).parent( '.ql-formats' ) );
}

