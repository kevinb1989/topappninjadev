<?php
namespace TopAppNinja\Stripe;

class Subscription implements SubscriptionInterface {

	public function subscribe($token, $professional){
		$professional -> subscription('TANSponsoredPro') -> create($token);
	}

	public function isSubscribed($professional){
		return $professional -> subscribed();
	}

	public function getSubscriptionInfo($professional){
		return [
				'billable_name' => $professional -> getBillableName(),
				'plan' => $professional -> getStripePlan()
			];
	}

	public function cancelSubscription($professional){
		$professional -> subscription() -> cancel();
	}

}