<template>
    <sup
    ><a
        class="reference"
        :id="'reference' + footnoteNumber"
        :href="'#footnote' + footnoteNumber"
        :title="title"
        :data-digit="digits"
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
      digits: this.digits
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
  computed: {
    title() {
      var text = this.text.replace( /(<([^>]+)>)/ig, '');
      text = text.replace( /, https:.*$/, '.');
      return text;
    },
    digits() {
      if (this.footnoteNumber < 10) {
        return 1
      }
      else {
        return 2
      }
    }
  },
};
</script>