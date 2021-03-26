/*
import 'vite/dynamic-import-polyfill'
import { createApp } from 'vue'
import { resolveComponent } from 'vue'

import Tabs from './components/ui/Tabs.vue'

// lazyblocks components
const LazyblockComponents = ['tabs']
for (const i in LazyblockComponents) {
  const comp = LazyblockComponents[i]
  wp.hooks.addAction(
    'lzb.components.PreviewServerCallback.onChange',
    comp,
    function (props) {
      const el = document.getElementsByClassName(
        props.attributes.blockUniqueClass
      )
      if (el.length) {
        const preview = el[0].getElementsByClassName('lzb-preview-server')
        console.log('changed?')
        if (preview.length) {
          const app = createApp({ template: preview[0].innerHTML })
          app.component('Tabs', Tabs)
          app.mount(preview[0])
        }
      }
    }
  )
}
*/
