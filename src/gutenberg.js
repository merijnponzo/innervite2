import 'vite/dynamic-import-polyfill'
import { createApp } from 'vue'
import { resolveComponent } from 'vue'

import Gutenblocks from './components/Gutenblocks.vue'
import Tabs from './components/ui/Tabs.vue'

window.PonzoGutenberg = function (blockId) {
  const el = document.getElementById(blockId)
  createApp({
    template: el.innerHTML,
    components: {
      Gutenblocks,
      Tabs,
    },
  }).mount(el)
}
