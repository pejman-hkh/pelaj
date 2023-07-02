<?php

if( @$_GET['api'] ) {
	class ViewClass {
		public static $instance1;
		public static function instance() {
			return self::$instance1 = @self::$instance1?:new self();
		}

		public function share( $name, $value ) {
			$this->data[ $name ] = $value;
		}
	}

	function view( $pick = '', $data = [] ) {
		if( $pick == '' ) {	
			$view = ViewClass::instance();

			return $view;
		} else {
			$view = ViewClass::instance();
			return json_encode( array_merge( $view->data, $data ) );
		}
	}
}

function __($key = null, $replace = [], $locale = null)
{

	$lang = \App\Models\Lang::where('key', $key)->first();

	if( ! @$lang->id && $key ) {
		$lang = new \App\Models\Lang();
		$lang->key = $key;
		$lang->save();
	}

    if (is_null($key)) {
        return $key;
    }

    return trans($key, $replace, $locale);
}