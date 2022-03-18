<?php

class publicationModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    // get a SINGLE publication
    public function getPublication($publication_id)
    {
        $this->db->query("SELECT * FROM publication WHERE publication_id = :publication_id");
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getSingle();
    }

    public function getAllPublications()
    {
        $this->db->query("SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp FROM profile INNER JOIN publication ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' ORDER BY timestamp DESC");
       // $this->db->query("SELECT * FROM publication WHERE publication_status = 'public'");
        return $this->db->getResultSet(); // controller would handle this data 
    }


    // haven't done, still have problem
    // 
    public function getAllPublicationsByAuthor($name)
    {   // modify parameter later if needed
        $this->db->query("SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_title, publication.publication_text, publication.timestamp FROM profile INNER JOIN publication ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public'  ORDER BY timestamp DESC");
        return $this->db->getResultSet(); // controller would handle this data 


    }


    public function getAllPublicationsByTitle()
    {    // modify parameter later if needed
    }

    public function getAllPublicationsByText()
    {   // modify parameter later if needed
    }



    // AUTHOR

}
