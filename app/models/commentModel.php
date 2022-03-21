<?php
class commentModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    /* 
     * Creates a comment
     */
    public function createComment($data)
    {   
        $authorID = $_SESSION['user_id'];
        $this->db->query("INSERT INTO publication_comment (profile_id, publication_id, publication_comment_text, timestamp) 
                values ((SELECT profile_id FROM profile WHERE author_id = $authorID), :publication_id, :publication_comment_text, now())");
 
        $this->db->bind(':publication_comment_text', $data['comment']);
        $this->db->bind(':publication_id', $data['pub_id']);
        return ($this->db->execute()); // returns true if success and false if failure
    }

    /*
     * Gets all publication comments
     */
    public function getPublicationComments($publication_id) {
        $this->db->query(
            "SELECT publication_comment.publication_comment_id, publication_comment.profile_id, publication_comment.publication_id, publication_comment.publication_comment_text, publication_comment.timestamp, profile.first_name, profile.middle_name, profile.last_name
            FROM publication_comment INNER JOIN profile 
            ON publication_comment.profile_id = profile.profile_id
            WHERE publication_id = :publication_id");
        $this->db->bind(':publication_id', $publication_id);
        return $this->db->getResultSet();
    }

    public function getAuthorPublicationComment($publication_comment_id) {
        $this->db->query("SELECT * FROM publication_comment WHERE publication_comment_id = :publication_comment_id");
        $this->db->bind(':publication_comment_id', $publication_comment_id);
        return $this->db->getSingle();
    }

    /*
     * Gets all the comments of the user
     */
    public function getAuthorPublicationComments() {
        $authorID = $_SESSION['user_id'];
        $this->db->query(
                // "SELECT publication_comment.publication_comment_id, publication_comment.profile_id, publication_comment.publication_id, 
                // publication_comment.publication_comment_text, publication_comment.timestamp,
                // profile.author_id, profile.profile_id,
                // publication.publication_id, publication.publication_title
                // FROM publication_comment 
                // INNER JOIN profile 
                // INNER JOIN publication
                // WHERE profile.author_id = $authorID
                // AND publication_comment.publication_id = publication.publication_id"); 
                "SELECT publication_comment.publication_comment_id, publication_comment.profile_id, publication_comment.publication_id, 
                publication_comment.publication_comment_text, publication_comment.timestamp,
                profile.author_id, profile.profile_id,
                publication.publication_id, publication.publication_title
                FROM publication_comment 
                INNER JOIN profile ON publication_comment.profile_id = profile.profile_id
                JOIN publication ON publication.publication_id = publication_comment.publication_id
                WHERE profile.author_id = '$authorID'"
        );
        return $this->db->getResultSet();
    }

    
    /*
     * Deletes a publication comment 
     */
    public function deletePublicationComment($publication_comment_id) {
        $this->db->query("DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id");
        $this->db->bind(':publication_comment_id', $publication_comment_id);
        
        return $this->db->execute();
    }

    /*
     *
     */
    public function editComment($data) {
        $this->db->query("UPDATE publication_comment SET publication_comment_text = :publication_comment_text
            WHERE publication_comment_id = :publication_comment_id");
            $this->db->bind(':publication_comment_text', $data['comment_text']);
            $this->db->bind(':publication_comment_id', $data['comment_id']);
        return $this->db->execute();
    }
}
