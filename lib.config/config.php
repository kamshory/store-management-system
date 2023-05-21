<?php
$oneLevelUp = __DIR__;
$twoLevelUp = dirname($oneLevelUp);
$syncConfigs = new stdClass();
$databaseConfigs = new stdClass();

$databaseConfigs->db_type = "mysql";
$databaseConfigs->db_host = "localhost";
$databaseConfigs->db_port = 3306;
$databaseConfigs->db_user = "root";
$databaseConfigs->db_pass = "alto1234";
$databaseConfigs->db_name = "store_management_system";
$databaseConfigs->db_time_zone = "Asia/Jakarta";
$databaseConfigs->config_file = $twoLevelUp."/db.ini";

$syncConfigs->sync_database_application_dir = $oneLevelUp;
$syncConfigs->sync_database_base_dir = $oneLevelUp."/volume.sync/database/pool";
$syncConfigs->sync_database_pool_name = "pool";
$syncConfigs->sync_database_rolling_prefix = "poll_";
$syncConfigs->sync_database_extension = ".dat";
$syncConfigs->sync_database_maximum_length = 1000000;
$syncConfigs->sync_database_delimiter = '------------------------912284ba5a823ba425efba890f57a4e2c88e8369';

$syncConfigs->sync_file_application_dir = $oneLevelUp;
$syncConfigs->sync_file_base_dir = $oneLevelUp."/volume.sync/file/pool";
$syncConfigs->sync_file_pool_name = "pool";
$syncConfigs->sync_file_rolling_prefix = "poll_";
$syncConfigs->sync_file_extension = ".dat";
$syncConfigs->sync_file_maximum_length = 50000;
$syncConfigs->sync_file_use_relative_path = true;

$syncConfigs->volume_sync_file_upload = $oneLevelUp."/volume.sync/file/upload";
$syncConfigs->volume_sync_file_download = $oneLevelUp."/volume.sync/file/download";
$syncConfigs->volume_sync_file_pool = $oneLevelUp."/volume.sync/file/pool";
$syncConfigs->volume_sync_database_upload = $oneLevelUp."/volume.sync/database/upload";
$syncConfigs->volume_sync_database_download = $oneLevelUp."/volume.sync/database/download";

$syncConfigs->sync_data_enable = true;
$syncConfigs->sync_time_enable = true;