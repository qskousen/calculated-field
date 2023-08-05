import {default as ListenerIndexField} from "./components/listener-field/IndexField.vue";
import {default as ListenerDetailField} from "./components/listener-field/DetailField.vue";
import {default as ListenerFormField} from "./components/listener-field/FormField.vue";
import {default as BroadcasterIndexField} from "./components/broadcaster-field/IndexField.vue";
import {default as BroadcasterDetailField} from "./components/broadcaster-field/DetailField.vue";
import {default as BroadcasterFormField} from "./components/broadcaster-field/FormField.vue";

Nova.booting((app, store) => {
	app.component('index-broadcaster-field', BroadcasterIndexField);
	app.component('detail-broadcaster-field', BroadcasterDetailField);
	app.component('form-broadcaster-field', BroadcasterFormField);

	app.component('index-listener-field', ListenerIndexField);
	app.component('detail-listener-field', ListenerDetailField);
	app.component('form-listener-field', ListenerFormField);
})
