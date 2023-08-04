import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-calculated-field', IndexField)
  app.component('detail-calculated-field', DetailField)
  app.component('form-calculated-field', FormField)
})
