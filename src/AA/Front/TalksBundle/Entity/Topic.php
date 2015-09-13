<?php

namespace AA\Front\TalksBundle\Entity;

use AA\Core\UserBundle\Entity\Brother;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="aa_topic")
 * @ORM\Entity(repositoryClass="AA\Front\TalksBundle\Repository\TopicRepository")
 */
class Topic
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
     * @var string
     *
     * @ORM\Column(name="topic_subject", type="string", length=255)
     */
    private $topicSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_content", type="text")
     */
    private $topicContent;

    /**
     * @var Brother
     *
     * @ORM\ManyToOne(targetEntity="AA\Core\UserBundle\Entity\Brother")
     * @ORM\JoinColumn(name="topic_user_id", referencedColumnName="id")
     *
     */
    private $topicUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="topic_date", type="datetime")
     */
    private $topicDate;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AA\Front\TalksBundle\Entity\Comment" , cascade={"persist","remove"}, mappedBy="commentTopic")
     */
    private $comments;

    /**
     * @var Comment
     */
    private $lastComment;

    /**
     * @var \Datetime
     */
    private $lastActivity;

    /**
     * @param $topicSubject
     * @param $topicContent
     * @param Brother $topicUser
     */
    public function __construct(Brother $topicUser, $topicSubject, $topicContent)
    {
        $this->topicSubject = $topicSubject;
        $this->topicContent = $topicContent;
        $this->topicUser = $topicUser;
        $this->topicDate = new \DateTime();
        $this->comments = new ArrayCollection();
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
     * @return string
     */
    public function getTopicSubject()
    {
        return $this->topicSubject;
    }

    /**
     * @param string $topicSubject
     */
    public function setTopicSubject($topicSubject)
    {
        $this->topicSubject = $topicSubject;
    }

    /**
     * @return string
     */
    public function getTopicContent()
    {
        return $this->topicContent;
    }

    /**
     * @param string $topicContent
     */
    public function setTopicContent($topicContent)
    {
        $this->topicContent = $topicContent;
    }

    /**
     * @return int
     */
    public function getTopicUser()
    {
        return $this->topicUser;
    }

    /**
     * @param int $topicUser
     */
    public function setTopicUser(Brother $topicUser)
    {
        $this->topicUser = $topicUser;
    }

    /**
     * @return \DateTime
     */
    public function getTopicDate()
    {
        return $this->topicDate;
    }

    /**
     * @param \DateTime $topicDate
     */
    public function setTopicDate(\DateTime $topicDate)
    {
        $this->topicDate = $topicDate;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
        return $this;
    }

    /**
     * @return Comment
     */
    public function getLastComment()
    {
        return $this->comments->last();
    }

    /**
     * @return \Datetime
     */
    public function getLastActivity()
    {
        return $this->comments->isEmpty() ? $this->getTopicDate() : $this->getLastComment()->getCommentDate();
    }

}
