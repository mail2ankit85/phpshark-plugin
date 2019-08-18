<?php

class AppModel{
	private $_connection;

	public function __construct($servername,$database,$username,$password){
			global $wpdb;
			$this->_connection = new wpdb($username,$password,$database,$servername);
			return $this->_connection;
	}

	public function get_results($query, $output_type = OBJECT){
			return $this->_connection->get_results($query);
	}

	public function get_var($query, $column_offset = 0, $row_offset = 0){
			return $this->_connection->get_var($query, $column_offset, $row_offset);
	}

	public function prepare($query,$array = []){
			$string = join(',',$array);
			return $this->_connection->prepare($query,$string);
	}

	public function insert( $table, $data, $format ){
			return $this->_connection->insert( $table, $data, $format );
	}

	public function replace( $table, $data, $format ){
		return $this->_connection->replace( $table, $data, $format );
	}

	public function update( $table, $data, $where, $format = null, $where_format = null ){
		return $this->_connection->update( $table, $data, $where, $format, $where_format  );
	}

	public function delete($table, $where, $where_format = null) {
		return $this->_connection->delete($query,$string);
	}

	public function query($query) {
		return $this->_connection->query($query);
	}

	public function show_errors() {
		return $this->_connection->show_errors();
	}

	public function hide_errors() {
		return $this->_connection->hide_errors();
	}

	public function print_error() {
		return $this->_connection->print_error();
	}

	public function get_col_info($type,$offset = -1) {
		return $this->_connection->get_col_info();
	}

	public function flush() {
		return $this->_connection->flush();
	}
}
