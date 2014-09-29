<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 28.06.14
 * Time: 2:04
 */

namespace Brainstrap\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 * @FileStore\Uploadable
 * @ORM\HasLifecycleCallbacks
 *
 * нет необходимости переопределять addGroup, removeGroup
 * https://github.com/FriendsOfSymfony/FOSUserBundle/issues/650
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="User_Group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sname;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="text", nullable=true)
     */
    protected $about;

    /**
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="avatar")
     * @ORM\Column(type="array")
     **/
    private $avatar;

    /**
     * @var datetime
     *
     * @ORM\Column(name="dateBirth", type="datetime", nullable=true)
     */
    protected $dateBirth;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $site;

    /**
     * @ORM\ManyToMany(targetEntity="Employment", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Employment",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="employment_id", referencedColumnName="id")}
     *      )
     */
    protected $employments;

    /**
     * @ORM\ManyToMany(targetEntity="Education", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Education",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="education_id", referencedColumnName="id")}
     *      )
     */
    protected $educations;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\UserBundle\Entity\Skill\Skill", orphanRemoval=false, cascade={"all"}, inversedBy="users")
     * @ORM\JoinTable(name="User_Skill",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skill_id", referencedColumnName="id")}
     *      )
     */
    protected $skills;

    /**
     * @ORM\ManyToMany(targetEntity="Testimonial", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Testimonial",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="testimonial_id", referencedColumnName="id")}
     *      )
     */
    protected $testimonials;

    /**
     * @ORM\ManyToMany(targetEntity="Hobby", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Hobby",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="hobby_id", referencedColumnName="id")}
     *      )
     */
    protected $hobbies;

    /**
     * @ORM\ManyToMany(targetEntity="Portfolio", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Portfolio",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="portfolio_id", referencedColumnName="id")}
     *      )
     */
    protected $portfolio;

    /**
     * @ORM\ManyToMany(targetEntity="Social", cascade={"all"}, orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Social",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="social_id", referencedColumnName="id")}
     *      )
     */
    protected $socials;

    /**
     * @ORM\ManyToMany(targetEntity="Service", orphanRemoval=false, cascade={"all"})
     * @ORM\JoinTable(name="User_Service",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="service_id", referencedColumnName="id")}
     *      )
     */
    protected $services;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $mark;

    public function __construct()
    {
        parent::__construct();
        $this->mark = 0;
    }

    /**
     * Get id.

     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.

     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.

     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sname.

     *
     * @param string $sname
     *
     * @return User
     */
    public function setSname($sname)
    {
        $this->sname = $sname;

        return $this;
    }

    /**
     * Get sname.

     *
     * @return string
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * Set fname.

     *
     * @param string $fname
     *
     * @return User
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname.

     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set about.

     *
     * @param string $about
     *
     * @return User
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about.

     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set avatar.

     *
     * @param array $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar.

     *
     * @return array
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set dateBirth.

     *
     * @param \DateTime $dateBirth
     *
     * @return User
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    /**
     * Get dateBirth.

     *
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * Set phone.

     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.

     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set site.

     *
     * @param string $site
     *
     * @return User
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.

     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set mark.

     *
     * @param string $mark
     *
     * @return User
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark.

     *
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Get groups.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add employment.

     *
     * @param \Brainstrap\UserBundle\Entity\Employment $employment
     *
     * @return User
     */
    public function addEmployment(\Brainstrap\UserBundle\Entity\Employment $employment)
    {
        $this->employments[] = $employment;

        return $this;
    }

    /**
     * Remove employment.

     *
     * @param \Brainstrap\UserBundle\Entity\Employment $employment
     */
    public function removeEmployment(\Brainstrap\UserBundle\Entity\Employment $employment)
    {
        $this->employments->removeElement($employment);
    }

    /**
     * Get employments.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployments()
    {
        return $this->employments;
    }

    /**
     * Add education.

     *
     * @param \Brainstrap\UserBundle\Entity\Education $education
     *
     * @return User
     */
    public function addEducation(\Brainstrap\UserBundle\Entity\Education $education)
    {
        $this->educations[] = $education;

        return $this;
    }

    /**
     * Remove education.

     *
     * @param \Brainstrap\UserBundle\Entity\Education $education
     */
    public function removeEducation(\Brainstrap\UserBundle\Entity\Education $education)
    {
        $this->educations->removeElement($education);
    }

    /**
     * Get educations.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * Add skill.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\Skill $skill
     *
     * @return User
     */
    public function addSkill(\Brainstrap\UserBundle\Entity\Skill\Skill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill.

     *
     * @param \Brainstrap\UserBundle\Entity\Skill\Skill $skill
     */
    public function removeSkill(\Brainstrap\UserBundle\Entity\Skill\Skill $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add testimonial.

     *
     * @param \Brainstrap\UserBundle\Entity\Testimonial $testimonial
     *
     * @return User
     */
    public function addTestimonial(\Brainstrap\UserBundle\Entity\Testimonial $testimonial)
    {
        $this->testimonials[] = $testimonial;

        return $this;
    }

    /**
     * Remove testimonial.

     *
     * @param \Brainstrap\UserBundle\Entity\Testimonial $testimonial
     */
    public function removeTestimonial(\Brainstrap\UserBundle\Entity\Testimonial $testimonial)
    {
        $this->testimonials->removeElement($testimonial);
    }

    /**
     * Get testimonials.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTestimonials()
    {
        return $this->testimonials;
    }

    /**
     * Add hobby.

     *
     * @param \Brainstrap\UserBundle\Entity\Hobby $hobby
     *
     * @return User
     */
    public function addHobby(\Brainstrap\UserBundle\Entity\Hobby $hobby)
    {
        $this->hobbies[] = $hobby;

        return $this;
    }

    /**
     * Remove hobby.

     *
     * @param \Brainstrap\UserBundle\Entity\Hobby $hobby
     */
    public function removeHobby(\Brainstrap\UserBundle\Entity\Hobby $hobby)
    {
        $this->hobbies->removeElement($hobby);
    }

    /**
     * Get hobbies.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Add portfolio.

     *
     * @param \Brainstrap\UserBundle\Entity\Portfolio $portfolio
     *
     * @return User
     */
    public function addPortfolio(\Brainstrap\UserBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio[] = $portfolio;

        return $this;
    }

    /**
     * Remove portfolio.

     *
     * @param \Brainstrap\UserBundle\Entity\Portfolio $portfolio
     */
    public function removePortfolio(\Brainstrap\UserBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio->removeElement($portfolio);
    }

    /**
     * Get portfolio.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Add social.

     *
     * @param \Brainstrap\UserBundle\Entity\Social $social
     *
     * @return User
     */
    public function addSocial(\Brainstrap\UserBundle\Entity\Social $social)
    {
        $this->socials[] = $social;

        return $this;
    }

    /**
     * Remove social.

     *
     * @param \Brainstrap\UserBundle\Entity\Social $social
     */
    public function removeSocial(\Brainstrap\UserBundle\Entity\Social $social)
    {
        $this->socials->removeElement($social);
    }

    /**
     * Get socials.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocials()
    {
        return $this->socials;
    }

    /**
     * Add service.

     *
     * @param \Brainstrap\UserBundle\Entity\Service $service
     *
     * @return User
     */
    public function addService(\Brainstrap\UserBundle\Entity\Service $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service.

     *
     * @param \Brainstrap\UserBundle\Entity\Service $service
     */
    public function removeService(\Brainstrap\UserBundle\Entity\Service $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Get services.

     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices()
    {
        return $this->services;
    }
}
