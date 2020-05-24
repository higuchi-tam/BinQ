<template>
  <div>
    <input type="hidden" name="tags" :value="tagsJson" />
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="タグを5個まで入力できます"
      :autocomplete-items="filteredItems"
      :add-only-from-autocomplete="true"
      :autocomplete-always-open="true"
      :add-on-key="[13, 32]"
      :max-tags="maxTags"
      @tags-changed="tagChanged"
      @focus="showAutoComplete"
    />
    <div id="js-tag_overlay" class="vue-tag-input-overlay" @click="hideAutoComplete"></div>
  </div>
</template>

<script>
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  components: {
    VueTagsInput
  },
  props: {
    initialTags: {
      type: Array,
      default: []
    },
    autocompleteItems: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      tag: "",
      tags: this.initialTags,
      validation: [
        {
          classes: "max-length",
          rule: tags => this.tags.length > 5
        }
      ],
      maxTags: 5
    };
  },
  methods: {
    hideTagInput() {
      const $input = $(".ti-new-tag-input");
      if (this.tags.length === 5) $input.prop("disabled", true);
      else $input.prop("disabled", false);
    },
    tagChanged(obj) {
      this.tags = obj;
      this.hideTagInput();
    },
    checkTag(obj) {
      if (this.tags.length >= 5) alert("タグは5つまでです");
      else obj.addTag();
    },
    showAutoComplete() {
      $(".ti-autocomplete").show();
      $("#js-tag_overlay").show();
    },
    hideAutoComplete() {
      $(".ti-autocomplete").hide();
      $("#js-tag_overlay").hide();
    }
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
      return JSON.stringify(this.tags);
    }
  },
  mounted() {
    this.hideTagInput();
  }
};
</script>

<style lang="css" scoped>
.vue-tags-input {
  max-width: inherit;
  background: none;
}
</style>
<style lang="css">
.vue-tags-input .ti-new-tag-input-wrapper {
  padding-left: 0;
  margin-left: 0;
}
.vue-tags-input .ti-input {
  border: none;
  padding-left: 0;
}
.vue-tags-input .ti-tag {
  background: transparent;
  border: none;
  color: #747373;
  margin-right: 4px;
  border-radius: 0px;
  font-size: 13px;
}
.vue-tags-input .ti-tag::before {
  content: "#";
}

.vue-tags-input .ti-autocomplete {
  display: none;
}

.vue-tag-input-overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  display: none;
}
</style>
