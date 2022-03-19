<?php

class commentModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function createComment($data)
    {
        $this->db->query("INSERT INTO publication_comment (profile_id, publication_id, publication_comment_text, timestamp) 
                values (:profile_id, :publication_id, :publication_comment_text, now())");
        $this->db->bind(':profile_id', $data['profile_id']);
        $this->db->bind(':publication_title', $data['publication_title']);
        $this->db->bind(':publication_comment_text', $data['publication_comment_text']);

        return ($this->db->execute()); // returns true if success and false if failure
    }
}
