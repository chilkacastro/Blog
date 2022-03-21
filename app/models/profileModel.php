<?php
class profileModel
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->db = new Model;
    }

    /*
     * Creates author/user profile and save it to the database
     */
    public function createProfile($data)
    {
        $username = $_SESSION['user_username'];
        $this->db->query("INSERT INTO profile (author_id,first_name, middle_name, last_name) values 
            ((SELECT author_id FROM author WHERE username = '$username'), :first_name, :middle_name, :last_name)");
        $this->db->bind(':first_name', $data['fname']);
        $this->db->bind(':middle_name', $data['mname']);
        $this->db->bind(':last_name', $data['lname']);

        return $this->db->execute();
    }

    /*
     * Gets the author/user profile information from the database
     */
    public function getProfile()
    {
        $authorID = $_SESSION['user_id'];
        $this->db->query("SELECT * FROM profile WHERE author_id = :author_id");
        $this->db->bind(':author_id', $authorID);
        return $this->db->getSingle();
    }

    /*
     * Updates the profile of the author/user and save it to the database
     */
    public function editProfile($data)
    {
        $this->db->query(
            "UPDATE profile
            SET first_name=:first_name, last_name=:last_name, middle_name=:middle_name 
            WHERE profile_id=:profile_id");
        $this->db->bind(':first_name', $data['fname']);
        $this->db->bind(':middle_name', $data['mname']);
        $this->db->bind(':last_name', $data['lname']);
        $this->db->bind(':profile_id', $data['profile_id']);
        return $this->db->execute();
    }

    /*
     * Creates a publication and save it to the database
     */
    public function createPublication($data)
    {
        $username = $_SESSION['user_username'];
        $this->db->query(
            "INSERT INTO publication (profile_id, publication_title, publication_text, timestamp, publication_status) 
            values ((SELECT profile_id FROM profile WHERE author_id = (SELECT author_id FROM author 
            WHERE username = '$username')), :publication_title, :publication_text, now(), :publication_status)");
        $this->db->bind(':publication_title', $data['title']);
        $this->db->bind(':publication_text', $data['text']);
        $this->db->bind(':publication_status', $data['status']);
        return $this->db->execute();
    }

    /*
     * Updates the publication and save it to the database
     */
    public function editPublication($data)
    {
        $this->db->query("UPDATE publication SET publication_title=:publication_title,
            publication_text=:publication_text, publication_status=:publication_status WHERE publication_id=:publication_id");
        $this->db->bind(':publication_title', $data['title']);
        $this->db->bind(':publication_text', $data['text']);
        $this->db->bind(':publication_status', $data['status']);
        $this->db->bind(':publication_id', $data['publication_id']);
        return $this->db->execute();
    }

    /*
     * Deletes a publication from the database
     */
    public function delete($data)
    {
        $this->db->query("DELETE FROM publication WHERE publication_id=:publication_id");
        $this->db->bind('publication_id', $data['publication_id']);
        return $this->db->execute();
    }

    /*
     * Retrieves all author/user publications
     */
    public function getAuthorPublications()
    {
        $username = $_SESSION['user_username'];
        $this->db->query(
            "SELECT author_id, profile.profile_id, profile.first_name, publication.publication_id, 
                publication.publication_status, profile.middle_name, profile.last_name, 
                publication.publication_title, publication.publication_text, publication.timestamp 
                FROM profile INNER JOIN publication 
                ON publication.profile_id = profile.profile_id
                WHERE author_id = (SELECT author_id FROM author WHERE username = '$username')"

        );
        return $this->db->getResultSet();
    }

    /*
     * Retrieves a specific author/user publication from the database
     */
    public function getAuthorPublication($publication_id)
    {
        $this->db->query(
            "SELECT publication.publication_id, publication.publication_title, 
                publication.publication_text, publication.timestamp, publication.publication_status,
                profile.first_name, profile.middle_name, profile.last_name
                FROM publication INNER JOIN profile
                ON publication.profile_id = profile.profile_id
                WHERE publication_id = :publication_id"
        );
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getSingle();
    }
}
