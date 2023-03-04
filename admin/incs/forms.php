<?php

define('WS_DB_VER',1.0);
define('WS_DB_VER_NAME',"WS_DB_VER");
define('CONTACT_TABLE',"contact_form");

$installed_ver = get_option(WS_DB_VER_NAME);
if ($installed_ver != WS_DB_VER) {
    create_tables();
}

function create_tables(){
    global $wpdb;
    $contact_table = $wpdb->prefix.CONTACT_TABLE;
    create_table("CREATE TABLE {$contact_table} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name text,
		tel text,
		subject text,
		massage text,
		flag BOOLEAN NOT NULL,
		PRIMARY KEY  (id)
	)");
    update_option(WS_DB_VER_NAME, WS_DB_VER);
}

function create_table($sql){
    global $wpdb;
    $table_name = $wpdb->prefix . CONTACT_TABLE;
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql.$charset_collate);
}

function get_data($table, $sort = 'DESC')
{
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}{$table}";
    $result = $wpdb->get_results($query . " ORDER By ID " . $sort);
    return $result;
}

function insert_record_table($table, $data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $table;
    $wpdb->insert(
        $table_name,
        $data
    );
    return $wpdb->insert_id;
}

function update_record_table($table, $data, $where, $format, $where_format)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $table;
    $status = $wpdb->update(
        $table_name,
        $data,
        $where,
        $format,
        $where_format
    );
    return $status;
}

function delete_record_table_by_id($table, $id)
{

    global $wpdb;
    $table_name = $wpdb->prefix . $table;
    $wpdb->delete($table_name, array('id' => $id), array('%d'));

}





