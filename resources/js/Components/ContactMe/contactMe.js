import AOS from 'aos'
import formContact from './../formContact/formContact.vue'
import sectionTitle from './../sectionTitle/sectionTitle.vue'
export default {
  name: 'ContactMe',
  components: {
    formContact,
    sectionTitle,
  },
  data() {
    return {
      title: 'contact',
      subtitle: 'me contacter',
    }
  },
  mounted() {
    AOS.init()
  },
  methods: {
  },

}