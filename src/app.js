import 'vite/dynamic-import-polyfill'

import { createApp, h } from 'vue'
import {
  App as InertiaApp,
  plugin as InertiaPlugin,
} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

import axios from 'axios'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// import './index.css'

InertiaProgress.init()

const app = document.getElementById('app')
const pages = import.meta.glob('./Pages/**/*.vue')

// Layout
import Layout from './Shared/Layout.vue'
import Tabs from './components/ponzu/Tabs.vue'
import Tab from './components/ponzu/Tab.vue'

createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: (name) => {
        const importPage = pages[`./Pages/${name}.vue`]
        if (!importPage) {
          throw new Error(
            `Unknown page ${name}. Is it located under Pages with a .vue extension?`
          )
        }
        return importPage().then((module) => module.default)
      },
    }),
})
  .mixin({ methods: {} })
  .use(InertiaPlugin)
  .component('Layout', Layout)
  .component('Tabs', Tabs)
  .component('Tab', Tab)
  .mount(app)
