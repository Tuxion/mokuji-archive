<?php namespace components\archive\models; if(!defined('TX')) die('No direct access.');

class ArchiveEntries extends \dependencies\BaseModel
{
  
  protected static
    
    $table_name = 'archive_archive_entries',
    
    $labels = array(
      'archive_id' => 'Archive',
      'author_id' => 'Author',
      'associated_group_id' => 'Associated group',
      'single_language_id' => 'Entry language',
      'image_id' => 'Image',
    ),
    
    $validate = array(
      'id' => array('required', 'number'=>'integer', 'gt'=>0),
      'archive_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'author_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'associated_group_id' => array('number'=>'integer', 'gt'=>0),
      'single_language_id' => array('number'=>'integer', 'gt'=>0),
      'image_id' => array('number'=>'integer', 'gt'=>0),
      'dt_related_to' => array('datetime')
    );
  
}
