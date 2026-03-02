<?php

namespace App\Models;



use App\Models\Model;

class AbstractModel extends Model
{
  protected $table = 'abstracts';

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);
  }

  public function getAbstractType()
  {
    return EVENT_TYPE;
  }


  public function export() {
    $abstracts = $this->findAllBy('abstract_type', EVENT_TYPE) ?? [];

    if (empty($abstracts)) {
      throw new \Exception("Nincsenek absztraktok az exportáláshoz.");
    }

    $data = array_map(function ($abstract) {
      return [
        'ID' => $abstract->id,
        'Title' => $abstract->title,
        'Author' => $abstract->author,
        'Type' => $abstract->abstract_type,
        'Created At' => $abstract->created_at,
      ];
    }, $abstracts);

    (new \Core\Excel())->data($data)->download(EVENT_TYPE . '_abstracts.xlsx');
  }


  public function exportAll() {
    $abstracts = $this->all();

    if (empty($abstracts)) {
      throw new \Exception("Nincsenek absztraktok az exportáláshoz.");
    }

    $data = array_map(function ($abstract) {
      return [
        'ID' => $abstract->id,
        'Title' => $abstract->title,
        'Author' => $abstract->author,
        'Type' => $abstract->abstract_type,
        'Created At' => $abstract->created_at,
      ];
    }, $abstracts);

    (new \Core\Excel())->data($data)->download('all_abstracts.xlsx');
  }

}
