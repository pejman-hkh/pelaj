<?php

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