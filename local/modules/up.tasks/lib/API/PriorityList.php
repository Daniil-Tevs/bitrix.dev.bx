<?php

namespace UP\Tasks\API;

class PriorityList
{
	public static function get()
	{
		return \Up\Tasks\Model\PriorityTable::query()->setSelect(['*'])->fetchCollection();
	}
}