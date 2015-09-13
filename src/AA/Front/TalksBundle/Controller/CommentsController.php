<?php

namespace AA\Front\TalksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/{topicId}/comments")
 */
class CommentsController extends Controller
{
    /**
     * @Route("/new", name="new_comment")
     * @Method({"POST"})
     */
    public function newCommentAction($topicId)
    {
        $request = $this->get('request_stack')->getCurrentRequest()->request;

        $this->get('aa.comments')->createComment(
            $this->get('aa.topics')->getTopic($topicId),
            $this->get('security.token_storage')->getToken()->getUser(),
            $request->get('commentContent', "<p>Aucun contenu</p>")
        );

        $this->get('session')->getFlashBag()->add(
            'comment-success',
            'Ton commentaire a été enregistré et apparaît ci-dessous !'
        );

        return $this->redirectToRoute('talks_topic', ['topicId' => $topicId]);
    }

    /**
     * @Template()
     */
    public function last5CommentsBlockAction()
    {
        return [
            'comments' => $this->get('aa.comments')->getLast5Comments()
        ];
    }
}
