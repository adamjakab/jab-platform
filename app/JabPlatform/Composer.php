<?php

namespace JabPlatform;

use Composer\Script\CommandEvent;

class Composer
{
	public static function hookRootPackageInstall(CommandEvent $event)
	{
		$event->getComposer()->getEventDispatcher()->addSubscriber(new RootPackageInstallSubscriber());
	}
}