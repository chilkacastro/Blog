<?php
class profileModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function createProfile($data)
    {
        $username = $_SESSION['user_username'];
        $this->db->query("INSERT INTO profile (author_id,first_name, middle_name, last_name) values 
            ((SELECT author_id FROM author WHERE username = '$username'), :first_name, :middle_name, :last_name)");
        $this->db->bind(':first_name', $data['fname']);
        $this->db->bind(':middle_name', $data['mname']);
        $this->db->bind(':last_name', $data['lname']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProfile($author_id)
    {
        $this->db->query("SELECT * FROM profile WHERE author_id = :author_id");
        $this->db->bind(':author_id', $author_id);
        return $this->db->getSingle();
    }

    public function editProfile($data)
    {
        $this->db->query("UPDATE profile SET first_name=:first_name, last_name=:last_name, middle_name=:middle_name WHERE profile_id=:profile_id");
        $this->db->bind(':first_name', $data['fname']);
        $this->db->bind(':middle_name', $data['mname']);
        $this->db->bind(':last_name', $data['lname']);
        $this->db->bind(':profile_id', $data['profile_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createPublication($data)
    {
        $username = $_SESSION['user_username'];
        $this->db->query("INSERT INTO publication (profile_id, publication_title, publication_text, 
            timestamp, publication_status) values ((SELECT profile_id FROM profile WHERE author_id = (SELECT author_id FROM author 
            WHERE username = '$username')),:publication_title, :publication_text, now(), :publication_status)");
        $this->db->bind(':publication_title', $data['title']);
        $this->db->bind(':publication_text', $data['text']);
        $this->db->bind(':publication_status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editPublication($data)
    {
        $this->db->query("UPDATE publication SET publication_title=:publication_title,
            publication_text=:publication_text, publication_status=:publication_status  WHERE publication_id=:publication_id");
        $this->db->bind(':publication_title', $data['title']);
        $this->db->bind(':publication_text', $data['text']);
        $this->db->bind(':publication_status', $data['status']);
        $this->db->bind(':publication_id', $data['publication_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data)
    {
        $this->db->query("DELETE FROM publication WHERE publication_id=:publication_id");
        $this->db->bind('publication_id', $data['publication_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //As an author, I can see all of my posts on my profile page
    public function getAuthorPublications()
    {
        $username = $_SESSION['user_username'];
        $this->db->query(
            "SELECT author_id, profile.profile_id, profile.first_name, publication.publication_id, publication.publication_status, profile.middle_name, profile.last_name, publication.publication_title, publication.publication_text, publication.timestamp 
                FROM profile INNER JOIN publication 
                ON publication.profile_id = profile.profile_id
                WHERE author_id = (SELECT author_id FROM author WHERE username = '$username')"
        );
        return $this->db->getResultSet();
    }

    // to get one specific publication from Profile view of an author
    public function getAuthorPublication($publication_id)
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
                WHERE publication_id = :publication_id"
        );
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getSingle();
    }

    public function searchByAuthor()
    {
    }

    //In order to find interesting posts, as a reader or an author, 
    // I need to be able to search for posts by title
    public function searchByTitle()
    {
    }

    public function searchByContent()
    {
    }
}
