<?php
namespace TopAppNinja\Repositories;

interface MessageRepositoryInterface {
	public function getAllMessageByProfessionalID($id);
	public function sendMessage($professionalID);
	public function deleteMessage($messageID);
}