<template>
    <sup
    ><a
        class="reference"
        :id="'reference' + footnoteNumber"
        :href="'#footnote' + footnoteNumber"
        :title="text"
        >{{footnoteNumber}}</a
    ></sup
    >
</template>

<script>
export default {
  created() {
    let footnote = {
      fid: this.fid,
      text: this.text,
      footnoteNumber: this.footnoteNumber,
    }
    this.$emit('footnote-added', footnote)
  },
  name: "Footnote",
  props: {
    text: {
      type: String,
      required: true
    },
    fid: {
      type: String,
      required: true
    },
    footnoteNumber: {
      type: Number,
      required: true
    }
  },
};
</script>