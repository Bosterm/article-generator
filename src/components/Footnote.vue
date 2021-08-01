<template>
  <sup class="ref-container" :data-tooltip="title"
    ><button
      class="reference"
      :id="'reference' + footnoteNumber"
      :data-digit="digits"
      @click="slideToElement"
      >{{ footnoteNumber }}</button
    >
    <span class="tooltip" v-html="title"></span>
  </sup>
</template>

<script>
export default {
  created() {
    let footnote = {
      fid: this.fid,
      text: this.text,
      footnoteNumber: this.footnoteNumber,
      digits: this.digits,
    };
    this.$emit("footnote-added", footnote);
  },
  name: "Footnote",
  props: {
    text: {
      type: String,
      required: true,
    },
    fid: {
      type: String,
      required: true,
    },
    footnoteNumber: {
      type: Number,
      required: true,
    },
  },
  methods: {
    slideToElement() {
      this.$emit("reference-clicked", 'footnote' + this.footnoteNumber)
    }
  },
  computed: {
    title() {
      var text = this.text.replace(/, <a.*$/, ".");
      return text;
    },
    digits() {
      if (this.footnoteNumber < 10) {
        return 1;
      } else {
        return 2;
      }
    },
  },
};
</script>