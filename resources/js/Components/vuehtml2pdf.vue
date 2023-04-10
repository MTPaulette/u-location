<template>
  <div>
    <vue3-html2pdf
      ref="html2Pdf"
      :show-layout="false"
      :float-layout="true"
      :enable-download="true"
      :preview-modal="true"
      :paginate-elements-by-height="1400"
      filename="hee hee"
      :pdf-quality="2"
      :manual-pagination="false"
      pdf-format="a4"
      pdf-orientation="landscape"

      pdf-content-width="800px"
      @progress="onProgress($event)"
      @hasStartedGeneration="hasStartedGeneration()"
      @hasGenerated="hasGenerated($event)"
    >
      <template #pdf-content>
        <!-- PDF Content Here -->
      </template>
    </vue3-html2pdf>
  </div>
</template>


<script>
import Vue3Html2pdf from 'vue3-html2pdf'

export default {

  components: {
    Vue3Html2pdf,
  },
  methods: {
    /*
            Generate Report using refs and calling the
            refs function generatePdf()
        */
    generatePdf () {
      console.log('====================================')
    },
  },
}

</script>