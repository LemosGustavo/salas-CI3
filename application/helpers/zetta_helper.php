<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('auto_version')) {
	function auto_version($url) {
		$path = pathinfo($url);
		$string = $path['basename'];
		$ver = '.version' . filemtime(DIRECTORIO . $url) . '.';
		$str = '.';
		if (($pos = strrpos($string, $str)) !== false) {
			$search_length = strlen($str);
			$str = substr_replace($string, $ver, $pos, $search_length);
			return $path['dirname'] . '/' . $str;
		} else {
			return $url;
		}
	}
}

if (!function_exists('lm')) {
	function lm($message) {
		log_message('error', print_r($message, TRUE));
	}
}

if (!function_exists('pm')) {
	function pm($message) {
		echo '<pre>';
		print_r($message);
		echo '</pre>';
	}
}

if (!function_exists('pq')) {
	function pq() {
		echo '<pre>';
		print_r(get_instance()->db->last_query());
		echo '</pre>';
	}
}

if (!function_exists('lq')) {
	function lq() {
		log_message('error', get_instance()->db->last_query());
	}
}

if (!function_exists('count_recursive')) {
	function count_recursive($array, $limit) {
		$count = 0;
		foreach ($array as $id => $_array) {
			if (is_array($_array) && $limit > 0) {
				$count += count_recursive($_array, $limit - 1);
			} else {
				$count += 1;
			}
		}
		return $count;
	}
}

if (!function_exists('zetta_form_submit')) {
	function zetta_form_submit($txt_btn) {
		if (empty($txt_btn)) {
			return;
		} elseif ($txt_btn === 'Eliminar') {
			return form_submit(array('class' => 'btn btn-danger pull-right', 'title' => 'Eliminar'), 'Eliminar');
		} else {
			return form_submit(array('class' => 'btn btn-primary pull-right', 'title' => 'Guardar'), 'Guardar');
		}
	}
}

if (!function_exists('trim_html')) {
	function trim_html($html) {
		$search = array(
			'/\n/', // replace end of line by a space
			'/\s+/', // replace end of line by a space
			'/\>[^\S ]+/s', // strip whitespaces after tags, except space
			'/[^\S ]+\</s', // strip whitespaces before tags, except space
			'/(\s)+/s' // shorten multiple whitespace sequences
		);
		$replace = array(
			' ',
			' ',
			'>',
			'<',
			'\\1'
		);
		return preg_replace($search, $replace, $html);
	}
}

/* End of file zetta_helper.php */
/* Location: ./application/helpers/zetta_helper.php */
