<template>
  <main>
    <h1 id="title">
      Recommendations for the University of Illinois Archives on the Handling of
      the Doris Duke Oral History Collection
    </h1>
    <h2 id="byline">Ben Ostermeier</h2>
    <article v-html="essay" />
    <footnote
    text='Office of the Chancellor, "Land Acknowledgement Statement," 2018, <a href="https://chancellor.illinois.edu/land_acknowledgement.html">https://chancellor.illinois.edu/land_acknowledgement.html</a>.'
    fid="chancellor-1"
    @reference-clicked="slideToElement"
    :footnoteNumber="
        footnotes.find((obj) => {
        return obj.fid === 'chancellor-1';
        }).footnoteNumber
    "
    @footnote-added="addFootnote"
    ></footnote>
      <footer id="references">
        <h2>References</h2>
        <ol>
          <div
            tabindex="0"
            v-for="footnote in footnotes"
            :key="footnote.fid"
            class="footnote"
            :id="'footnote' + footnote.footnoteNumber"
          >
            <span class="footnote-number">
              <button
                :data-digit="footnote.digits"
                @click="slideToElement('reference' + footnote.footnoteNumber)"
                >{{ footnote.footnoteNumber }}</button
              >
            </span>
            <cite
              v-html="footnote.text"
            ></cite>
          </div>
        </ol>
      </footer>
  </main>
</template>

<script>
import Footnote from "./Footnote.vue";
import externalData from '../assets/data.json';

export default {
  name: "Essay",

  components: {
    Footnote,
  },
  data() {
    return {
      footnoteCounter: 1,
      essay: externalData.essay,
      footnotes: [
        {
          fid: "chancellor-1",
          footnoteNumber: 0,
        }
      ],
    };
  },
  methods: {
    addFootnote(footnote) {
      footnote.footnoteNumber = this.footnoteCounter;
      let fn = this.footnotes.find((obj) => {
        return obj.fid === footnote.fid;
      });
      fn.footnoteNumber = footnote.footnoteNumber;
      fn.text = footnote.text;
      if (footnote.footnoteNumber < 10) {
        fn.digits = 1;
      } else {
        fn.digits = 2;
      }
      this.footnoteCounter += 1;
    },
    slideToElement(elementID) {
      var element = document.getElementById(elementID)
      element.scrollIntoView({behavior: "smooth", block: "center"});
      element.focus({preventScroll: true});
    }
  },
  mounted() {
    this.footnotes.sort((a, b) => a.footnoteNumber - b.footnoteNumber);
  },
};
</script>