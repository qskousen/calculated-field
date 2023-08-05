<?php

namespace Qskousen\CalculatedField;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Field;

class BroadcasterField extends Field {
	/**
	 * The field's component.
	 *
	 * @var string
	 */
	public $component = 'broadcaster-field';

	/**
	 * The type of the field to show on the form
	 * @var string
	 */
	public $type = 'number';

	/**
	 * BroadcasterField constructor.
	 *
	 * @param $name
	 * @param null $attribute
	 * @param callable|null $resolveCallback
	 */
	public function __construct($name, $attribute = null, callable $resolveCallback = null) {
		parent::__construct($name, $attribute, $resolveCallback);

		$this->withMeta([
			'type'        => 'number',
			'broadcastTo' => 'broadcast-field-input'
		]);
	}

	/**
	 * Set the type of the field (string, number)
	 *
	 * @param $type
	 * @return Element
	 */
	public function setType($type): Element {
		return $this->withMeta([
			'type' => $type
		]);
	}

	/**
	 * Allows us to set the format of the number according to Intl.NumberFormat
	 * @param $broadcastChannel
	 * @return Element
	 */
	public function numberFormat($format, $locale = 'en-US'): Element {
		return $this->withMeta([
			'numberFormat' => $format,
			'locale'       => $locale
		]);
	}

	/**
	 * Tells the client side component which channel to broadcast on
	 * @param $broadcastChannel
	 * @return Element
	 */
	public function broadcastTo($broadcastChannel): Element {
		return $this->withMeta([
			'broadcastTo' => $broadcastChannel
		]);
	}

}
