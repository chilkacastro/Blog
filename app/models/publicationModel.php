<?php

    class publicationModel{
        public function __construct(){
            $this->db = new Model;
        }
    
        // get a publication
        public function getPublication($publication_id){
            $this->db->query("SELECT * FROM credentials WHERE username = :username");
            $this->db->bind(':username',$publication_id);
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
            $this->db->query("INSERT INTO credentials (username, pass_hash) values (:username, :pass_hash)");
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':pass_hash', $data['pass_hash']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        // AUTHOR
        public function updatePublication($data) {
            $this->db->query("UPDATE users SET Name=:name, City=:city, Phone=:phone, Picture=:picture WHERE ID=:user_id");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':picture',$data['picture']);
            $this->db->bind('user_id',$data['ID']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function deletePublication($data) {
            $this->db->query("DELETE FROM users WHERE ID=:user_id");
            $this->db->bind('user_id',$data['ID']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>