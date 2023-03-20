// import downloadCv from './../downloadCv/downloadCv.vue'
export default {
  name: 'Navbar',
  components: {
    // downloadCv,
  },
  props: {
    src: {
      type: String,
      default: 'me-pink',
    },
  },
  data() {
    return {
      showMenu: false,
    }
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu
    },
    getImgUrl(src) {
      return  new URL('./../../../../public/profile/'+src+'.jpg', import.meta.url).href
    },
  },
}