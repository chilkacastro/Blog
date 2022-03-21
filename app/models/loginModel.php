<?php
class loginModel
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->db = new Model;
    }

    /*
     * Gets the author/user information from the database
     */
    public function getUser($username)
    {
        $this->db->query("SELECT * FROM author WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->getSingle();
    }

    /*
     * Creates the author/user and save it to the database
     */
    public function createUser($data)
    {
        $this->db->query("INSERT INTO author (username, password_hash) values (:username, :pass_hash)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pass_hash', $data['pass_hash']);

        return $this->db->execute();
    }
}
