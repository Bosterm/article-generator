<template>
  <main>
    <h1 id="title">
      Recommendations for the University of Illinois Archives on the Handling of
      the Doris Duke Oral History Collection
    </h1>
    <h2 id="byline">Ben Ostermeier</h2>
    <article>
      <component v-bind:is="processedEssay" />
      <footer id="references">
        <h2>References</h2>
        <ol>
          <div tabindex="0" v-for="footnote in footnotes" :key="footnote.id" class="footnote" :id="'footnote' + footnote.number">
            <span class="footnote-number">
              <button :data-digit="digits(footnote)" @click="slideToElement('reference' + footnote.number)">{{ footnote.number }}</button>
            </span>
            <cite v-html="footnote.text"></cite>
          </div>
        </ol>
      </footer>
    </article>
  </main>
</template>

<script>
import Footnote from "./Footnote.vue";
import Vue from 'vue';
import EssayDataService from "../services/EssayDataService";

Vue.component('footnote', Footnote);

export default {
  name: "Essay",

  components: {
    Footnote,
  },
  data() {
    return {
      essay: '',
      footnotes: [],
    };
  },
  methods: {
    slideToElement(elementID) {
      var element = document.getElementById(elementID)
      element.scrollIntoView({ behavior: "smooth", block: "center" });
      element.focus({ preventScroll: true });
    },
    digits(fn) {
      if (fn.number < 10) {
        return 1;
      } else {
        return 2;
      }
    },
    retrieveEssay() {
      EssayDataService.get(1)
        .then((response) => {
          if (!response.data) {
            return;
          }
          this.essay = response.data.data.essay.body;
          this.footnotes = response.data.data.footnotes;
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  mounted() {
    this.retrieveEssay();
  },
  computed: {
    processedEssay() {
      var tempEssay = this.essay;

      this.footnotes.forEach(fn => {
        let fnHTML = "<footnote text='" + fn.text + "' fid='" + fn.id + "' @reference-clicked=\"slideToElement\" :number='" + fn.number + "'></footnote>";
        let fnReplaceString = '[fid:' + fn.id + ']';
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