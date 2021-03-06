<?php

class Message extends Model
{
    public function save($data, $id = null)
    {
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {
            return false;
        } elseif (!$data['name'] || !$data['email'] || !$data['message'] || !$data['response']) {
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if (!$id) { // Add new record
            $sql = "
                insert into messages
                  set name = '{$name}',
                      email = '{$email}',
                      message = '{$message}'
            ";
        } else { //update existing record
            $sql = "
                UPDATE messages
                  set name = '{$name}',
                      email = '{$email}',
                      message = '{$message}'
                  where id = {$id}
            ";
        }

        return $this->db->query($sql);
    }

    public function getList()
    {
        $sql = "Select * from messages";
        return $this->db->query($sql);
    }
}