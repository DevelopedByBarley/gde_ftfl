<?php

namespace App\Models;



use App\Models\Model;

  class Subscriber extends Model
  {
    protected $table = 'subscriptions';

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
  }
?>