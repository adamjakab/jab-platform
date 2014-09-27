<?php
/**
 * Created by Adam Jakab.
 * Date: 27/09/14
 * Time: 12.56
 */

namespace JabPlatform;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Script\ScriptEvents;
use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;

class RootPackageInstallSubscriber {

	public static function installAcmeDemoBundle(CommandEvent $event) {
		ScriptHandler::installAcmeDemoBundle($event);
	}

	public static function setupNewDirectoryStructure(CommandEvent $event) {
		ScriptHandler::defineDirectoryStructure($event);
	}

	public static function getSubscribedEvents() {
		return array(
			ScriptEvents::POST_INSTALL_CMD => array(
				array('setupNewDirectoryStructure', 512),
				array('installAcmeDemoBundle', 0)
			),
		);
	}
}