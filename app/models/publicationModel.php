<?php

    class publicationModel{
        public function __construct(){
            $this->db = new Model;
        }
    
        // get a SINGLE publication
        public function getPublication($publication_title){
            $this->db->query("SELECT * FROM publication WHERE publication_title = :publication_title");
            $this->db->bind(':publication_title', $publication_title);
            return $this->db->getSingle();
        }

        public function getAllPublications() {
            $this->db->query("SELECT * FROM publication");
            return $this->db->getResultSet(); // controller would handle this data 
        }


        public function getAllPublicationsByAuthor($data) {   // modify parameter later if needed
        }

    
        public function getAllPublicationsByTitle() {    // modify parameter later if needed
        }

        public function getAllPublicationsByText() {   // modify parameter later if needed
        }

        public function createPublication($data){
            $this->db->query("INSERT INTO publication (profile_id, publication_title, publication_text, 
            timestamp, publication_status) values (:profile_id, :publication_title, :publication_text, now(), :publication_status)");
            $this->db->bind('profile_id', $data['profile_id']);
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_text', $data['publication_text']);
            $this->db->bind(':timestamp', $data['publication_title']);
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_status', $data['publication_status']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        // AUTHOR
        public function updatePublication($data) {
            $this->db->query("UPDATE publication (profile_id, publication_title, publication_text, 
            timestamp, publication_status) SET profile_id=:profile_id, publication_title=:publication_title,
            publication_text=:publication_text, timestamp=:timestamp, publication_status=:publication_status");
            $this->db->bind('profile_id', $data['profile_id']);
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_text', $data['publication_text']);
            $this->db->bind(':timestamp',$data['timestamp']);
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
    }
?>