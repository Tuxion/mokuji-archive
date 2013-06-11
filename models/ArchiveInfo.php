<?php namespace components\archive\models; if(!defined('TX')) die('No direct access.');

class ArchiveInfo extends \dependencies\BaseModel
{
  
  protected static
    
    $table_name = 'archive_archive_info',
    
    $validate = array(
      'archive_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'language_id' => array('required', 'number'=>'integer', 'gt'=>0),
      'title' => array('required', 'string', 'not_empty', 'between'=>array(0, 255)),
      'description' => array('string')
    );
  
}
