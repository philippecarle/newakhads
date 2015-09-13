<?php

namespace AA\Front\TalksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AA\Core\UserBundle\Entity\Brother;
use AA\Front\TalksBundle\Entity\Topic;

/**
 * Comment
 *
 * @ORM\Table(name="aa_comment")
 * @ORM\Entity(repositoryClass="AA\Front\TalksBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Topic
     *
     * @ORM\ManyToOne(targetEntity="AA\Front\TalksBundle\Entity\Topic")
     * @ORM\JoinColumn(name="comment_topic_id", referencedColumnName="id")
     */
    private $commentTopic;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_content", type="text")
     */
    private $commentContent;

    /**
     * @var Brother
     *
     * @ORM\ManyToOne(targetEntity="AA\Core\UserBundle\Entity\Brother")
     * @ORM\JoinColumn(name="comment_user_id", referencedColumnName="id")
     */
    private $commentUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date", type="datetime")
     */
    private $commentDate;

    /**
     * @param \AA\Front\TalksBundle\Entity\Topic $commentTopic
     * @param $commentContent
     * @param Brother $commentUser
     */
    public function __construct(Topic $commentTopic, Brother $commentUser, $commentContent)
    {
        $this->commentTopic = $commentTopic;
        $this->commentContent = $commentContent;
        $this->commentUser = $commentUser;
        $this->commentDate = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCommentTopic()
    {
        return $this->commentTopic;
    }

    /**
     * @param \AA\Front\TalksBundle\Entity\Topic $commentTopic
     * @return $this
     */
    public function setCommentTopic(Topic $commentTopic)
    {
        $this->commentTopic = $commentTopic;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param $commentContent
     * @return $this
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentUser()
    {
        return $this->commentUser;
    }

    /**
     * @param Brother $commentUser
     * @return $this
     */
    public function setCommentUser(Brother $commentUser)
    {
        $this->commentUser = $commentUser;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param $commentDate
     * @return $this
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
        return $this;
    }

}
