<template>
  <sup class="ref-container" :data-tooltip="title"
    ><a
      class="reference"
      :id="'reference' + footnoteNumber"
      :href="'#footnote' + footnoteNumber"
      :data-digit="digits"
      >{{ footnoteNumber }}</a
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