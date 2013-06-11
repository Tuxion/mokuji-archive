<?php namespace components\archive\models; if(!defined('TX')) die('No direct access.');

class ArchiveEntryInfo extends \dependencies\BaseModel
{
  
  protected static
    
    $table_name = 'archive_archive_entry_info',
    
    $labels = array(
      'archive_entry_id' => 'Archive entry'
    ),
    
    $validate = array(
      'archive_entry_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'language_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'title' => array('required', 'string', 'not_empty', 'between'=>array(0, 255)),
      'description' => array('string'),
      'full_text' => array('string'),
    );
  
}
