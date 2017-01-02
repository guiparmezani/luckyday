<?php

function validate_download($time_stamp) {
	if (!isset($time_stamp) || (time() - $time_stamp) > 30) {
		return false;
	}
	return true;
}