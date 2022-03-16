<?php
    class profileModel {
        public function __construct() {
            $this->db = new Model;
        }

        public function createProfile($data) {
            $username = $_SESSION['user_username'];
            $this->db->query("INSERT INTO profile (author_id,first_name, middle_name, last_name) values 
            ((SELECT author_id FROM author WHERE username = '$username'), :first_name, :middle_name, :last_name)");
            $this->db->bind(':first_name', $data['fname']);
            $this->db->bind(':middle_name', $data['mname']);
            $this->db->bind(':last_name', $data['lname']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public function createPublication($data){
            $username = $_SESSION['user_username'];
            $this->db->query("INSERT INTO publication (profile_id, publication_title, publication_text, 
            timestamp, publication_status) values ((SELECT profile_id FROM profile WHERE author_id = (SELECT author_id FROM author 
            WHERE username = '$username')),:publication_title, :publication_text, now(), :publication_status)");
            $this->db->bind(':publication_title', $data['title']);
            $this->db->bind(':publication_text', $data['text']);
            $this->db->bind(':publication_status', $data['status']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function updatePublication($data) {
            $username = $_SESSION['user_username'];
            $this->db->query("UPDATE publication SET publication_title=:publication_title,
            publication_text=:publication_text, timestamp=now(), publication_status=:publication_status  WHERE profile_id = 
            (SELECT profile_id FROM profile WHERE author_id = (SELECT author_id FROM author 
            WHERE username = $username))");
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_text', $data['publication_text']);
            $this->db->bind(':publication_status',$data['publication_status']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function deletePublication($data) {
            $this->db->query("DELETE FROM publication WHERE publication_id=:publication_id");
            $this->db->bind('publication_id',$data['publication_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //As an author, I can see all of my posts on my profile page
        public function getAuthorPublications() {
            $username = $_SESSION['user_username'];
            $this->db->query("SELECT * FROM publication WHERE profile_id = 
            (SELECT profile_id FROM profile WHERE author_id = (SELECT author_id FROM author 
            WHERE username = $username)");
            return $this->db->getResultSet();
        }


        // In order to read interesting posts, as a reader or an author, 
        // I need to see a list of all publications, most recent first
        // Thanh: i dont think it's needed
        // public function getAllPublications() {

        // }

        public function searchByAuthor() {

        }

        //In order to find interesting posts, as a reader or an author, 
        // I need to be able to search for posts by title
        public function searchByTitle() {
            
        }

        public function searchByContent() {

        }
    }



?>