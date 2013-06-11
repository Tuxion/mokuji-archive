<?php namespace components\archive\models; if(!defined('TX')) die('No direct access.');

class Archives extends \dependencies\BaseModel
{
  
  protected static
    
    $table_name = 'archive_archives',
    
    $labels = array(
      'owner_id' => 'Owner'
    ),
    
    $validate = array(
      'id' => array('required', 'number'=>'integer', 'gt'=>0),
      'owner_id' => array('required', 'number'=>'integer', 'gt'=>0)
    );
  
  public function get_info()
  {
    return mk('Sql')
      ->table('archive', 'ArchiveInfo')
      ->where('archive_id', $this->id)
      ->where('language_id', mk('Language')->id)
      ->execute_single();
  }
  
  public function get_title()
  {
    return $this->info->title;
  }
  
  public function get_description()
  {
    return $this->info->description;
  }
  
  public function get_owner()
  {
    return mk('Sql')
      ->table('account', 'Accounts')
      ->pk($this->owner_id)
      ->execute_single();
  }
  
  public function get_num_entries()
  {
    return mk('Sql')
      ->table('archive', 'ArchiveEntries')
      ->where('archive_id', $this->id)
      ->count();
  }
  
}
