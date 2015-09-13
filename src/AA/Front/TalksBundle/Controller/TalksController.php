<?php

namespace AA\Front\TalksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("")
 */
class TalksController extends Controller
{
    /**
     * @Route("", name="talks_list")
     * @Method({"GET"})
     * @Template()
     */
    public function topicsAction()
    {
        return [
            'talks' => $this->get('aa.topics')->getTopics()
        ];
    }

    /**
     * @Route("/new", name="talks_new_topic")
     * @Method({"GET"})
     * @Template()
     */
    public function newTopicAction()
    {
        return [];
    }

    /**
     * @Route("/{topicId}", name="talks_topic", requirements={"topicId" = "\d+"})
     * @Template()
     */
    public function topicAction($topicId)
    {
        return [
            'topic' => $this->get('aa.topics')->getTopic($topicId)
        ];
    }

    /**
     * @Route("", name="talks_new_topic_creation")
     * @Method({"POST"})
     */
    public function newTopicCreationAction()
    {
        $request = $this->get('request_stack')->getCurrentRequest()->request;

        $topic = $this->get('aa.topics')->createTopic(
            $this->get('security.token_storage')->getToken()->getUser(),
            $request->get('topicSubject', "<p>Aucun titre</p>"),
            $request->get('topicContent', "<p>Aucun contenu</p>")
        );

        return $this->redirectToRoute('talks_topic', ['topicId' => $topic->getId()]);
    }
}
