<?php
class User extends Model {
    public function getByLogin($login){
        $login = $this->db->escape($login);
        $sql = "select * from users WHERE login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if (isset($result[0])){
            return $result[0];
        }
        return false;
    }
}