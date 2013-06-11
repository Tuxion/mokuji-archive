<?php namespace components\archive; if(!defined('TX')) die('No direct access.');

//Make sure we have the things we need for this class.
tx('Component')->check('update');
tx('Component')->load('update', 'classes\\BaseDBUpdates', false);

class DBUpdates extends \components\update\classes\BaseDBUpdates
{
  
  protected
    $component = 'archive',
    $updates = array(
      '0.0.1-alpha' => '0.0.2-alpha',
      '0.0.2-alpha' => '0.0.3-alpha'
    );
  
  public function update_to_0_0_3_alpha($current_version, $forced)
  {
    
    if($forced === true){
      tx('Sql')->query('DROP TABLE IF EXISTS `#__archive_archives`');
      tx('Sql')->query('DROP TABLE IF EXISTS `#__archive_archive_info`');
      tx('Sql')->query('DROP TABLE IF EXISTS `#__archive_archive_entries`');
      tx('Sql')->query('DROP TABLE IF EXISTS `#__archive_archive_entry_info`');
    }
    
    tx('Sql')->query('
      CREATE TABLE `#__archive_archives` (
        `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
        `owner_id` INT(10) unsigned NOT NULL,
        `dt_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `dt_last_modified` TIMESTAMP NOT NULL,
        PRIMARY KEY (`id`),
        KEY `title` (`title`),
        KEY `dt_created` (`dt_created`),
        KEY `dt_last_modified` (`dt_last_modified`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
    tx('Sql')->query('
      CREATE TABLE `#__archive_archive_info` (
        `archive_id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
        `language_id` INT(10) unsigned NOT NULL,
        `title` varchar(255) NOT NULL,
        `description` TEXT NULL DEFAULT NULL,
        PRIMARY KEY (`archive_id`, `language_id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
    tx('Sql')->query('
      CREATE TABLE `#__archive_archive_entries` (
        `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
        `archive_id` INT(10) unsigned NOT NULL,
        `author_id` INT(10) unsigned NOT NULL,
        `associated_group_id` INT(10) unsigned NULL DEFAULT NULL,
        `single_language_id` INT(10) unsigned NULL DEFAULT NULL,
        `image_id` INT(10) unsigned NULL DEFAULT NULL,
        `dt_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `dt_last_modified` TIMESTAMP NOT NULL,
        `dt_relates_to` TIMESTAMP NOT NULL,
        PRIMARY KEY (`id`),
        KEY `archive_id` (`archive_id`),
        KEY `dt_relates_to` (`dt_relates_to`),
        KEY `dt_last_modified` (`dt_last_modified`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
    tx('Sql')->query('
      CREATE TABLE `#__archive_archive_entry_info` (
        `archive_entry_id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
        `language_id` INT(10) unsigned NOT NULL,
        `title` varchar(255) NOT NULL,
        `description` TEXT NULL DEFAULT NULL,
        `full_text` LONGTEXT NULL DEFAULT NULL,
        PRIMARY KEY (`archive_entry_id`, `language_id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8
    ');
    
  }
  
  public function update_to_0_0_2_alpha($current_version, $forced)
  {
    
    if($current_version == '0.0.1-alpha')
      return $this->install_0_0_2_alpha(false, $forced);
    
  }
  
  public function install_0_0_2_alpha($dummydata, $forced)
  {
    
    //Queue self-deployment with CMS component.
    $this->queue(array(
      'component' => 'cms',
      'min_version' => '3.0'
      ), function($version){
        
        tx('Component')->helpers('cms')->_call('ensure_pagetypes', array(
          array(
            'name' => 'archive',
            'title' => 'Archive component'
          ),
          array(
            'archive_manager' => 'MANAGER'
          )
        ));
        
      }
    ); //END - Queue CMS
    
  }
  
}
