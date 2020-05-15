// import("./components/dropdown");

import Vue from "vue";
import ArticleLike from "./components/ArticleLike";
import ArticleTagsInput from "./components/ArticleTagsInput";
import FollowButton from "./components/FollowButton";
import jquery from "jquery";
window.$ = jquery;
import Quill from 'quill';
import createImgBtnDom from './components/createImgBtn';

// import DropDown from "./components/dropdown.js";

require("./components/dropdown");
require("./components/createImgBtn");
require("./components/uploadImg");
require("./components/comment");
require("./components/formSubmit");
require("./components/resizeImg");

//vueコンポーネントを使用する
const app = new Vue({
    el: "#app",
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton
    }
});

//Quilleditor

// 拡張してエディタ内のHTMLを取得するfunctionを用意
Quill.prototype.getHtml = function() {
    return this.container.querySelector('.ql-editor').innerHTML
}

$(document).ready(() => {
        $('.js-quill-editor').each((index, e) => {
            const $target  = $($(e).data('target'))
            window.Delta = Quill.import('delta');
            window.editor = new Quill(e, {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline',],
                        ['link'],
                        ['blockquote'],
                    ]
                },
                placeholder: 'ご自由にお書きください。',
                theme: 'snow'
            });
            //テキストの変更だけでなく、カーソル位置変更イベントも取得するため、editor-changeイベントに変更
            //カーソル位置の取得と、Quillエディタ内のHTMLをformに設定
            editor.on('editor-change', (eventName, ...args) => {
                let cursorPosition = "";

                //text-changeイベントのとき
                if(eventName === 'text-change'){
                    // Quillエディタ内のHTMLをformに設定する
                    const html = editor.getHtml();
                    $target.val(html);
                    // カーソル位置を更新 getSelection()はカーソル位置取得メソッド。
                    // テキストエリア外をクリックしたときはnullでエラーになるので、if文判定を入れている
                    if(editor.getSelection()) {
                        cursorPosition = editor.getSelection().index;
                    }
                // selection-changeイベントのとき
                }else if(eventName === 'selection-change'){
                    // カーソル位置を更新(テキストエリア外をクリックしたときは、直前の値をセットする)
                    const oldDelta = args[0];
                    const newDelta = args[1];
                    cursorPosition = (newDelta) ? newDelta.index : oldDelta.index;
                }
                //更新したカーソル位置をhiddenにセットする
                $('#js-articleId__for-ajax').attr('data-cursor__index',cursorPosition);
            });
            //編集画面だった場合、読み込み時にhiddenに記事idをセットする
            if($('#js-articleId__for-ajax').attr('data-article__id')){
                const html = editor.getHtml();
                $target.val(html)
            }
    });
    //画像追加ボタンDOM生成
    createImgBtnDom();
    $('.js-quill-editor').css('height', '55rem');
});
