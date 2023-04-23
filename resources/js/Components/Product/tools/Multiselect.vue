<template>
  <div>
    <VueMultiselect 
      v-model="selected" :options="options" name="selected[]"
      :multiple="true" :taggable="true" tag-placeholder="Add this as new tag"
      placeholder="select advantage"
      label="city"
      track-by="id" :close-on-select="false" :clear-on-select="false" :preserve-search="true"
      @tag="addTag"
    />
    <br />ipsum <pre class="langage-json"><code> {{ selected }}</code></pre> <br />
  </div>
</template>

<script>
import VueMultiselect from 'vue-multiselect'
export default{
  components: { VueMultiselect },

  data () {
    return {
      selected: [],
      options: [
        {id: '1' , city: 'city 1'},
        {id: '2' , city: 'city 2'},
        {id: '3' , city: 'city 3'},
        {id: '4' , city: 'city 4'},
      ],
      options1: [
        {
          "city": "San Martin",
          "city_ascii": "San Martin",
          "lat": -33.06998533,
          "lng": -68.49001612,
          "pop": 99974,
          "country": "Argentina",
          "iso2": "AR",
          "iso3": "ARG",
          "province": "Mendoza",
          "timezone": "America/Argentina/Mendoza",
        },
        {
          "city": "San Nicolas",
          "city_ascii": "San Nicolas",
          "lat": -33.33002114,
          "lng": -60.24000289,
          "pop": 117123.5,
          "country": "Argentina",
          "iso2": "AR",
          "iso3": "ARG",
          "province": "Ciudad de Buenos Aires",
          "timezone": "America/Argentina/Buenos_Aires",
        },
        {
          "city": "San Francisco",
          "city_ascii": "San Francisco",
          "lat": -31.43003375,
          "lng": -62.08996749,
          "pop": 43231,
          "country": "Argentina",
          "iso2": "AR",
          "iso3": "ARG",
          "province": "Córdoba",
          "timezone": "America/Argentina/Cordoba",
        },
      ],
    }
  },

  methods: {
    addTag(newTag) {
      const tag = {
        id: newTag.substring(0,2)+Math.floor((Math.random()*10000000)),
        city: newTag,
      }
      this.options.push(tag)
      this.selected.push(tag)
    },
  },
}
</script>
<!-- <style src="@vueform/multiselect/themes/tailwind.css"></style> -->
<style src="vue-multiselect/dist/vue-multiselect.css"></style>