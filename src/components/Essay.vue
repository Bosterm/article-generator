<template>
  <main>
    <h1 id="title">
      Recommendations for the University of Illinois Archives on the Handling of
      the Doris Duke Oral History Collection
    </h1>
    <h2 id="byline">Ben Ostermeier</h2>
    <article>
      <component v-bind:is="processedEssay" />
    </article>
    <footer id="references">
      <h2>References</h2>
      <ol>
        <div tabindex="0" v-for="footnote in footnotes" :key="footnote.fid" class="footnote" :id="'footnote' + footnote.footnoteNumber">
          <span class="footnote-number">
            <button :data-digit="footnote.digits" @click="slideToElement('reference' + footnote.footnoteNumber)">{{ footnote.footnoteNumber }}</button>
          </span>
          <cite v-html="footnote.text"></cite>
        </div>
      </ol>
    </footer>
  </main>
</template>

<script>
import Footnote from "./Footnote.vue";
import externalData from '../assets/data.json';
import Vue from 'vue';
Vue.component('footnote', Footnote);

export default {
  name: "Essay",

  components: {
    Footnote,
  },
  data() {
    return {
      essay: externalData.essay,
      footnotes: externalData.footnotes
    };
  },
  methods: {
    slideToElement(elementID) {
      var element = document.getElementById(elementID)
      element.scrollIntoView({ behavior: "smooth", block: "center" });
      element.focus({ preventScroll: true });
    }
  },
  computed: {
    processedEssay() {
      var tempEssay = this.essay;

      this.footnotes.forEach(fn => {
        let fnHTML = "<footnote text='" + fn.text + "' fid='" + fn.fid + "' @reference-clicked=\"slideToElement\" :footnoteNumber='" + fn.footnoteNumber + "'></footnote>";
        let fnReplaceString = '[fid:' + fn.fid + ']';
        tempEssay = tempEssay.replace(fnReplaceString, fnHTML);
      });

      return {
        template: '<div>' + tempEssay + '</div>',
        methods: {
          slideToElement(elementID) {
            var element = document.getElementById(elementID)
            element.scrollIntoView({ behavior: "smooth", block: "center" });
            element.focus({ preventScroll: true });
          }
        },
      }

    }
  }
};
</script>