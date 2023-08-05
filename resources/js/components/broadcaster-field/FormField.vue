<template>
	<DefaultField :field="field" :errors="errors">
		<template #field>
			<input
					:id="field.name"
					:type="this.field.type"
					class="w-full form-control form-input form-input-bordered"
					:class="errorClasses"
					:placeholder="field.name"
					:value="format(value, field.numberFormat, field.locale)"
					@input="setFieldAndMessage"
					:readonly="field.readonly"
			/>
		</template>
	</DefaultField>
</template>

<script>
import {FormField, HandlesValidationErrors} from "laravel-nova";

export default {
	mixins: [FormField, HandlesValidationErrors],

	props: ["resourceName", "resourceId", "field"],

	mounted() {
		Nova.$emit(this.field.broadcastTo, {
			field_name: this.field.attribute,
			value: this.value,
		});
	},

	methods: {
		setFieldAndMessage(el) {
			const rawValue = el.target.value;
			let parsedValue = rawValue;

			if (this.field.type === "number") {
				parsedValue = Number(rawValue);
			}

			Nova.$emit(this.field.broadcastTo, {
				field_name: this.field.attribute,
				value: parsedValue
			});

			this.value = parsedValue;
		},

		/*
		 * Set the initial, internal value for the field.
		 */
		setInitialValue() {
			this.value = this.field.value || "";
		},

		/**
		 * Fill the given FormData object with the field's internal value.
		 */
		fill(formData) {
			formData.append(this.field.attribute, this.value || "");
		},

		/**
		 * Update the field's internal value.
		 */
		handleChange(value) {
			this.value = value;
		},

		format(number, format, locale) {
			if (!format) {
				return number;
			}
			return new Intl.NumberFormat(locale, format).format(number);
		}
	}
};
</script>