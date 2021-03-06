<?php
class publicationModel
{
    /*
    * Default constructor
    */
    public function __construct()
    {
        $this->db = new Model;
    }

    /*
     * Retrieves a specific publication from the database based on the publication_id
     */
    public function getPublication($publication_id)
    {
        // Previous query
        // $this->db->query("SELECT * FROM publication WHERE publication_id = :publication_id");
        // $this->db->bind(':publication_id', $publication_id);
        // return $this->db->getSingle();

        // Improved query
        $this->db->query(
            "SELECT publication.publication_id, publication.publication_title, publication.publication_text, 
            publication.timestamp, publication.publication_status,
            profile.first_name, profile.middle_name, profile.last_name
            FROM publication INNER JOIN profile
            ON publication.profile_id = profile.profile_id
            WHERE publication_id = :publication_id
        ");
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getSingle();
    }

    /*
     * Retrieves all publications from the database
     */
    public function getAllPublications()
    {
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, 
            publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' 
            ORDER BY timestamp DESC");
        return $this->db->getResultSet(); 
    }

    /*
     * Retrieves all publications from the database based on the input author
     */
    public function getAllPublicationsByAuthor($name)
    {   
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, publication.publication_id, 
            publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND (lower(profile.first_name) like '%$name%' 
            OR lower(profile.middle_name) like '%$name%' OR lower(profile.last_name) like '%$name%')
            ORDER BY timestamp DESC;"
        );
        return $this->db->getResultSet(); 
    }

    /*
     * Retrieves all publications from the database based on the input title
     */
    public function getAllPublicationsByTitle($title)
    {    // modify parameter later if needed
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, 
            publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND lower(publication.publication_title) like '%$title%'
            ORDER BY timestamp DESC;"
        );
        return $this->db->getResultSet(); 
    }

    /*
     * Retrieves all publications from the database based on the input content
     */
    public function getAllPublicationsByText($content)
    {   
        $this->db->query(
            "SELECT profile.first_name, profile.middle_name, profile.last_name, 
            publication.publication_id, publication.publication_title, publication.publication_text, publication.timestamp 
            FROM profile INNER JOIN publication 
            ON publication.profile_id = profile.profile_id
            WHERE publication_status = 'public' AND lower(publication.publication_text) like '%$content%'
            ORDER BY timestamp DESC;"
        );
        return $this->db->getResultSet();
    }
}
