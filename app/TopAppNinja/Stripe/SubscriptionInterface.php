<?php
namespace TopAppNinja\Stripe;

interface SubscriptionInterface {

	public function subscribe($token, $professional);
	public function getSubscriptionInfo($professional);
	public function isSubscribed($professional);
	public function cancelSubscription($professional);
}