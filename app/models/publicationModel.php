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
    {   
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND (lower(profile.first_name) like '%$name%' OR lower(profile.middle_name) like '%$name%' OR lower(profile.last_name) like '%$name%')
            ORDER BY timestamp DESC;");

        return $this->db->getResultSet(); // controller would handle this data 
    }


    public function getAllPublicationsByTitle($title)
    {    // modify parameter later if needed
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND lower(publication.publication_title) like '%$title%'
            ORDER BY timestamp DESC;");

        return $this->db->getResultSet(); // controller would handle this data 



    }

    public function getAllPublicationsByText($content)
    {   
        $this->db->query(
        "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM publication_comment INNER JOIN publication 
            ON publication_comment.publication_id = publication.publication_id
            INNER JOIN profile on profile.profile_id = publication_comment.profile_id 

            WHERE publication_status = 'public' AND lower(publication_comment.publication_comment_text) like '%$content%'
            ORDER BY timestamp DESC;");

        return $this->db->getResultSet(); // controller would handle this data 

    }

}
