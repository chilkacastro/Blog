<?php

class publicationModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    //
    public function getPublication($publication_id)
    {
        // $this->db->query("SELECT * FROM publication WHERE publication_id = :publication_id");
        // $this->db->bind(':publication_id', $publication_id);
        // return $this->db->getSingle();

        // Improved query
        $this->db->query(
                "SELECT publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp, publication.publication_status,
                profile.first_name, profile.middle_name, profile.last_name
                FROM publication INNER JOIN profile
                ON publication.profile_id = profile.profile_id
                WHERE publication_id = :publication_id");
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getSingle();
    }

    public function getAllPublications()
    {
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' 
            ORDER BY timestamp DESC");
     
        return $this->db->getResultSet(); // controller would handle this data 
    }

    public function getAllPublicationsByAuthor($name)
    {   // modify parameter later if needed
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND (lower(profile.first_name) like '%$name%' OR lower(profile.middle_name) like '%$name%' OR lower(profile.last_name) like '%$name%')
            ORDER BY timestamp DESC;");

        return $this->db->getResultSet(); // controller would handle this data 
    }


    public function getAllPublicationsByTitle()
    {    // modify parameter later if needed
    }

    public function getAllPublicationsByText()
    {   // modify parameter later if needed
    }

}
