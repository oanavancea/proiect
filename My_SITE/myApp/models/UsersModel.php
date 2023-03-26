<?php

class UsersModel extends DBModel
{
    protected $userName;
    protected $userEmail;
    protected $userPass;

    public function __construct($uName = 'N', $uEmail = 'E', $uPass = 'P')
    {
        // set properties
        $this->userName = $uName;
        $this->userEmail = $uEmail;
        $this->userPass = $uPass;
    }

    public function getDetails()
    {
        return $this->userName . ' are emailul ' .
            $this->userEmail . ' și parola ' .
            $this->userPass;
    }

    public function getUsers()
    {
        $q = "SELECT * FROM	`users_test`";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function delUser($id)
    {
        $q = "DELETE FROM `users_test` WHERE `id` = $id;";
        $result = $this->db()->query($q);
        if ($result)
            return true;
        else
            return false;
    }

    public function addUser($uName, $uPass, $uEmail = 'generic@email.ro')
    {
        $hashdPass = password_hash($uPass, PASSWORD_DEFAULT);
        $q = "INSERT INTO `users_test`
                (`userName`, `userEmail`, `userPass`, `hashedPass`)
                VALUES (?, ?, ?, ?);";
        // prepared statements
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ssss", $uName, $uEmail, $uPass, $hashdPass);
        if ($myPrep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modUser($id, $uName = 'NumeGeneric', $uPass = 'PassGeneric', $uEmail = 'generic@email.ro')
    {
        $hashdPass = password_hash($uPass, PASSWORD_DEFAULT);
        $q = "UPDATE `users_test` SET
                `userName`=?,`userEmail`=?,`userPass`=?,`hashedPass`= ?
            WHERE `id` = $id";
        // prepared statements
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ssss", $uName, $uEmail, $uPass, $hashdPass);
        $myPrep->execute();
        $myPrep->close();
    }

    public function isAuth($uName, $uPass)
    {
        // interoghez baza de date
        $q = "SELECT * FROM `users_test` WHERE `userName` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $uName);
        $myPrep->execute();
        $result = $myPrep->get_result()->fetch_assoc();
        $myPrep->close();
        if (!$result)
            return false; // dacă NU a găsit userul, returnează false
        // verifica parola
        if (password_verify($uPass, $result['hashedPass'])) {
            return true;
        } else {
            return false;
        }
        // returnez true sau false
    }


    public function addSubscriber($email)
    {
        $q = "INSERT INTO `newslleter`
                (`Email`)
                VALUES (?);";
        // prepared statements
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $email);

        if ($myPrep->execute()) {
            return true;
        } else {
            return false;
        }
    }

}