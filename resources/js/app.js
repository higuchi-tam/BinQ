// import("./components/dropdown");

import Vue from "vue";
import ArticleLike from "./components/ArticleLike";
import ArticleTagsInput from "./components/ArticleTagsInput";
import FollowButton from "./components/FollowButton";
import jquery from "jquery";
window.$ = jquery;
import Quill from 'quill';
// import DropDown from "./components/dropdown.js";

require("./components/dropdown");

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
            const editor = new Quill(e, {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, false] }],
                        ['bold', 'italic', 'underline',],
                        ['image'],
                        ['link'],                    ]
                },
                placeholder: 'ご自由にお書きください。',
                theme: 'snow'
            });
            editor.on('text-change', (delta) => {
                if (delta) {
                    // Quillエディタ内のHTMLをformに設定する
                    const html = editor.getHtml();
                    $target.val(html)
                }
            })
        })
});


