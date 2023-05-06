import '../css/app.css'
import 'flowbite'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { ZiggyVue } from 'ziggy'
import BaseLayout from '@/Layouts/BaseLayout.vue'
//import MainLayout from '@/Layouts/MainLayout.vue'

/* progress when render inertia page */
InertiaProgress.init({
  delay: 0,
  color: "#fd5906",
  includeCSS: true,
  showSpinner: true,
})


// import "@fortawesome/fontawesome-free/css/all.min.css"


createInertiaApp({
  progress: false,
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')
    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || BaseLayout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})