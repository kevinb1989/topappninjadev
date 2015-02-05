<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Message;
use TopAppNinja\Entities\Professional;

class MessageRepository implements MessageRepositoryInterface{

	public function getAllMessagesByProfessionalID($pProfessionalID){
		return Professional::find($pProfessionalID) -> messages;
	}

	public function getMessageByID($pMessageID){
		return Message::find($pMessageID);
	}

	public function sendMessage($input){
		$message = Message::create();
		$message -> Email = $input['pEmail'];
		$message -> PhoneNumber = $input['pPhoneNumber'];
		$message -> Message = $input['pMessage'];
		$message -> ProfessionalID = $input['pProfessionalID'];
		$message -> save();
	}

	public function deleteMessage($pMessageID){
		Message::destroy($pMessageID);
	}
}