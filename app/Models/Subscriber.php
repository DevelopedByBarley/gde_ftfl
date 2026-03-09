<?php

namespace App\Models;



use App\Models\Model;

class Subscriber extends Model
{
  protected $table = 'subscriptions';

  /**
   * Get all subscribers who subscribed to a specific conference
   */
  public function getByConference(string $conference): array
  {
    try {
      $sql = "SELECT * FROM {$this->table} WHERE JSON_CONTAINS(conferences, :conference)";
      $conferenceJson = json_encode($conference);
      $results = $this->db->query($sql, ['conference' => $conferenceJson])->get();
      return $results ?? [];
    } catch (\Exception $e) {
      return [];
    }
  }

  /**
   * Get all unique conferences for a user by email
   * Uses JSON_EXTRACT to get conferences from all registrations
   */
  public function getConferencesByEmail(string $email): array
  {
    try {
      $sql = "SELECT DISTINCT JSON_UNQUOTE(JSON_EXTRACT(conferences, CONCAT('$[', idx, ']'))) as conference
                FROM {$this->table}
                CROSS JOIN (
                  SELECT 0 as idx UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 
                  UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9
                ) as numbers
                WHERE email = :email
                AND JSON_EXTRACT(conferences, CONCAT('$[', idx, ']')) IS NOT NULL";

      $results = $this->db->query($sql, ['email' => $email])->get();

      return array_map(fn($row) => $row->conference, $results ?? []);
    } catch (\Exception $e) {
      return [];
    }
  }

  protected function buildExportData(array $subscribers): array
  {
    return array_map(function ($subscriber) {
      return [
        'ID' => $subscriber->id,
        'Name' => $subscriber->name ?? '',
        'Email' => $subscriber->email ?? '',
        'Company' => $subscriber->company ?? '',
        'Phone' => $subscriber->phone ?? '',
        'Conferences' => $subscriber->conferences ?? '',
        'Registration_Type' => $subscriber->registration_type ?? '',
        'Participation_Type' => $subscriber->participation_type ?? '',
        'Is_Erasmus' => (int)$subscriber->is_erasmus === 1 ? 'Yes' : 'No',
        'Created At' => $subscriber->created_at ?? '',
      ];
    }, $subscribers);
  }

  // Using Excel class to export subscribers to Excel
  public function exportSubscribersToExcel(string $fileName = 'subscribers.xlsx')
  {
    $subscribers = $this->all();

    if (empty($subscribers)) {
      throw new \Exception("Nincsenek előfizetők az exportáláshoz.");
    }

    $data = $this->buildExportData($subscribers);

    (new \Core\Excel())->data($data)->download($fileName);
  }

  public function exportSubscribersToExcelByConference(string $conference, string $fileName = null)
  {
    $subscribers = $this->getByConference($conference);

    if (empty($subscribers)) {
      throw new \Exception("Nincsenek előfizetők az exportáláshoz.");
    }

    $data = $this->buildExportData($subscribers);

    $downloadName = $fileName ?: "subscribers-{$conference}.xlsx";
    (new \Core\Excel())->data($data)->download($downloadName);
  }

  public function exportAll()
  {
    $this->exportSubscribersToExcel('subscribers.xlsx');
  }

  public function export()
  {
    $this->exportSubscribersToExcelByConference(EVENT_TYPE, 'subscribers-ftfl.xlsx');
  }

  public function exportOnlySpeakersToExcel()
  {
    $subscribers = $this->getByConference(EVENT_TYPE);

    if (empty($subscribers)) {
      throw new \Exception("Nincsenek előfizetők az exportáláshoz.");
    }

    $speakers = array_values(array_filter($subscribers, function ($subscriber) {
      return isset($subscriber->registration_type) && strtolower($subscriber->registration_type) === 'speaker';
    }));

    if (empty($speakers)) {
      throw new \Exception("Nincsenek előfizetők a megadott konferenciára.");
    }

    $data = $this->buildExportData($speakers);

    (new \Core\Excel())->data($data)->download('speakers.xlsx');
  }


  public function exportOnlyAttendeesToExcel()
  {
    $subscribers = $this->getByConference(EVENT_TYPE);


    if (empty($subscribers)) {
      throw new \Exception("Nincsenek előfizetők az exportáláshoz.");
    }

    $attendees = array_values(array_filter($subscribers, function ($subscriber) {
      return isset($subscriber->registration_type) && strtolower($subscriber->registration_type) === 'attendee';
    }));

    if (empty($attendees)) {
      throw new \Exception("Nincsenek előfizetők a megadott konferenciára.");
    }

    $data = $this->buildExportData($attendees);


    (new \Core\Excel())->data($data)->download('attendees.xlsx');
  }
}
