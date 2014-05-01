<?PHP
insert_counter_onlinevisitor( $tbl_counter_onlinevisitor, $t_stamp,$REMOTE_ADDR,$PHP_SELF,$BROWSER_UO,$REFERER_UO,$NAMAHOST_UO,$PORT_UO );
delete_counter_onlinevisitor( $tbl_counter_onlinevisitor , $timeout);
distinct_ip_counter_onlinevisitor( $tbl_counter_onlinevisitor );
$users_online = check_users_online( $tbl_counter_onlinevisitor, $link_host );
?>