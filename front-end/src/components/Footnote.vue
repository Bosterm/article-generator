<template>
  <sup class="ref-container" :data-tooltip="title"
    ><button
      class="reference"
      :id="'reference' + number"
      :data-digit="digits"
      @click="slideToElement"
      >{{ number }}</button
    >
    <span class="tooltip" v-html="title"></span>
  </sup>
</template>

<script>
export default {
  created() {
    let footnote = {
      id: this.id,
      text: this.text,
      number: this.number,
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
    id: {
      type: String,
      required: true,
    },
    number: {
      type: Number,
      required: true,
    },
  },
  methods: {
    slideToElement() {
      this.$emit("reference-clicked", 'footnote' + this.number)
    }
  },
  computed: {
    title() {
      var text = this.text.replace(/, <a.*$/, ".");
      return text;
    },
    digits() {
      if (this.number < 10) {
        return 1;
      } else {
        return 2;
      }
    },
  },
};
</script>