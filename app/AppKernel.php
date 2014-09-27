<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

	/**
	 * @param string $environment
	 * @param bool   $debug
	 */
	public function __construct($environment, $debug) {
		ini_set("xdebug.var_display_max_depth", 7);
		parent::__construct($environment, $debug);
	}

	public function boot() {
		parent::boot();
	}

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),

            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
	        new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
	        new Knp\Bundle\MenuBundle\KnpMenuBundle(),
	        new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
	        new Lexik\Bundle\MaintenanceBundle\LexikMaintenanceBundle(),
	        new JMS\DiExtraBundle\JMSDiExtraBundle($this),
	        new JMS\JobQueueBundle\JMSJobQueueBundle(),
	        new JMS\AopBundle\JMSAopBundle(),
	        new FOS\UserBundle\FOSUserBundle(),
	        new Ornicar\GravatarBundle\OrnicarGravatarBundle(),
	        /*new JMS\SerializerBundle\JMSSerializerBundle(),*/
	        /*new FOS\RestBundle\FOSRestBundle(),*/


	        /* JAB BASE BUNDLES */
	        new Jab\Platform\PlatformBundle\JabPlatformBundle(),
	        new Jab\Tool\TemplateBundle\JabToolTemplateBundle(),
	        new Jab\Config\ApplicationBundle\JabConfigApplicationBundle(),
	        new Jab\Config\EntityBundle\JabConfigEntityBundle(),
	        new Jab\App\UserBundle\JabAppUserBundle(),
	        new Jab\App\DashboardBundle\JabAppDashboardBundle(),


			/* NEW BUNDLES */
            new Adi\TestBundle\AdiTestBundle(),
            new Jab\App\AccountBundle\JabAppAccountBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
