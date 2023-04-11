import '../css/app.css'
import 'flowbite'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { InertiaProgress } from '@inertiajs/progress'
import MainLayout from '@/Layouts/MainLayout.vue'

/* progress when render inertia page */
InertiaProgress.init({
  delay: 2,
  color: "#fd5906",
  includeCSS: true,
  showSpinner: true,
})


// import "@fortawesome/fontawesome-free/css/all.min.css"


createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')
    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || MainLayout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

import.meta.glob([
  '../images/**',
])