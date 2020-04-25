// import("./components/dropdown");

import Vue from "vue";
import ArticleLike from "./components/ArticleLike";
import ArticleTagsInput from "./components/ArticleTagsInput";
import FollowButton from "./components/FollowButton";
import jquery from "jquery";
window.$ = jquery;
// import DropDown from "./components/dropdown.js";

require("./components/dropdown");

const app = new Vue({
    el: "#app",
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton
    }
});

const editor = new EditorJS({
    holder: "editor",
    tools: {
        header: Header,
        image:{
            class: ImageTool,
          config: {
          endpoints: {
          byFile: 'http://localhost:3000/uploadFile', // Your backend file uploader endpoint
          byUrl: 'http://localhost:3000/fetchUrl', // Your endpoint that provides uploading by Url
        }
      }
        },
        list: List,
        quote: Quote,

    }
});
