<?php

namespace AA\Front\TalksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Util\Debug;

/**
 * @Route("")
 */
class TalksController extends Controller
{
    /**
     * @Route("/", name="talks_list")
     * @Template()
     */
    public function indexAction()
    {
        return [
            'talks' => $this->get('aa.topics')->getTopics()
        ];
    }

    /**
     * @Route("/{topicId}", name="talks_topic")
     * @Template()
     */
    public function topicAction($topicId)
    {
        return [
            'topic' => $this->get('aa.topics')->getTopic($topicId)
        ];
    }
}
