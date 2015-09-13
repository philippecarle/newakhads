<?php

namespace AA\Front\TalksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="aa_comment")
 * @ORM\Entity(repositoryClass="AA\Front\TalksBundle\Entity\CommentRepository")
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
     * @var integer
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
     * @var integer
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
     * @param Topic $commentTopic
     */
    public function setCommentTopic(Topic $commentTopic)
    {
        $this->commentTopic = $commentTopic;
    }

    /**
     * @return string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param string $commentContent
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    }

    /**
     * @return int
     */
    public function getCommentUser()
    {
        return $this->commentUser;
    }

    /**
     * @param int $commentUser
     */
    public function setCommentUser($commentUser)
    {
        $this->commentUser = $commentUser;
    }

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param \DateTime $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

}
