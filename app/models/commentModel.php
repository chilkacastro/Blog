<?php
class commentModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function createComment($data)
    {   
        $authorID = $_SESSION['user_id'];
        $this->db->query("INSERT INTO publication_comment (profile_id, publication_id, publication_comment_text, timestamp) 
                values ((SELECT profile_id FROM profile WHERE author_id = $authorID), :publication_id, :publication_comment_text, now())");
 
        $this->db->bind(':publication_comment_text', $data['comment']);
        $this->db->bind(':publication_id', $data['pub_id']);
        return ($this->db->execute()); // returns true if success and false if failure
    }

    public function getPublicationComments($publication_id) {
        $this->db->query("SELECT * FROM publication_comment WHERE publication_id = :publication_id");
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getResultSet();
    }
}
