<?php
namespace TopAppNinja\Repositories;

interface MessageRepositoryInterface {
	public function getAllMessagesByProfessionalID($pProfessionalID);
	public function getMessageByID($pMessageID);
	public function sendMessage($input);
	public function deleteMessage($pMessageID);
}