// import("./components/dropdown");

import Vue from "vue";
import ArticleLike from "./components/ArticleLike";
import axios from 'axios';//追記
import DropDown from "./components/dropdown.js";

const app = new Vue({
    el: "#app",
    components: {
        ArticleLike
    }
});

// DropDown();
