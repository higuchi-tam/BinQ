// import("./components/dropdown");

import Vue from "vue";
import ArticleLike from "./components/ArticleLike";
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'
import DropDown from "./components/dropdown.js";


const app = new Vue({
    el: "#app",
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
    }
});

// DropDown();
