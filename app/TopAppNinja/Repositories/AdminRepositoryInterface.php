<?php
namespace TopAppNinja\Repositories;

interface AdminRepositoryInterface{

	public function login($pUsername, $pPassword);
	public function logout();
	public function createAdmin($pAdminInfoArr);
	public function deleteAdmin($pAdminID);
}