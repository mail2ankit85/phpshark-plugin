<?php 
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Pagination
	{
		private $_page;
		private $_total;
		private $_limit;

		function getDetails(
			$total,
			$page_number = 1,
			$columns = 3,
			$limit = 10,
			$per_page = 1
		)
		{
			$records = $total;
			$total_pages = ceil( (1 / $limit) * $records);
			$offset = ($page_number - 1) * $limit + 1;
			$rows = ceil($limit / $columns);
			$calc['total'] = $total_pages;
			$calc['offset'] = $offset;
			$calc['limit'] = $limit;
			$calc['pages'] = $per_page;
			$calc['records'] = $total;
			$calc['rows'] = $rows;
			$calc['columns'] = $columns;
			$this->_page = $page_number;
			$this->_total = $total;
			$this->_limit = $limit;
			return $calc;
		}
	}
}
