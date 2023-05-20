import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-video-youtube', IndexField)
  app.component('detail-video-youtube', DetailField)
  app.component('form-video-youtube', FormField)
})
